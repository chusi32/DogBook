<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Province;
use App\Location;
use App\Breed;
use App\Pet;
use App\Pedigree;
use App\Wall;
use App\Message;
use App\Gallery;
use App\Image;
use App\Company;
use File;
use Input;
use Validator;
use Redirect;
use App\Http\Requests\ModifiedPetRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\ModifyPedigreeRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use View;


class PetController extends Controller
{

    /**
    *   Constante para el path a media
    */
    protected $custom_path = '../public/media/'; //->Desarrollo
    //protected $custom_path = '../public_html/media/'; //->Producción

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function getForm()
    {
        $provinces = Province::pluck('nombreProvincia', 'id');
        $breeds = Breed::pluck('nombreRaza', 'id');
        return view('pets.new_pet', compact('provinces', 'breeds'));
    }

    public function newPet(Request $request)
    {
        $idPedigree = 0;
        $currentUser = Auth::user();
        $data = $request->all();

        $rules = [
            'image' => 'mimes:jpeg,bmp,png',
            'name' => 'required|max:255'
        ];

        //Si se selecciona que tiene pedigree, se añaden las reglas para los campos
        //del pedigree
        if(isset($data['chkPedigree'])){
            $rules['nameFather'] = 'required';
            $rules['nameMother'] = 'required';
            $rules['description'] = 'required|max:500';
        }
        $validator = Validator::make($data, $rules);
        if($validator -> fails()) {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }

        //Se guarda la información de la nueva mascota
        $idPet = Pet::create([
            'idUsuario' => $currentUser -> id,
            'nombre' => $data['name'],
            'edad' =>  $data['age'],
            'sexo' => $data['sex'],
            'idProvincia' =>  $data['province'],
            'idLocalidad' =>  $data['location'],
            'idRaza' =>  $data['breed'],
            'idMuro' => 0
        ]) -> id;

        //Se guarda la foto de perfil. Si no se ha seleccionado ninguna,
        //se pone la de defecto.
        $path = $currentUser->id.'/pets';
        if(File::exists($this->custom_path . $path))
        {
            mkdir($this->custom_path . $path.'/'.$idPet, 0777);
            if(isset($data['image'])) {
                $request->file('image')->move($this->custom_path . $path.'/'.$idPet, 'profile.png');
            }
            else {
                copy($this->custom_path.'resources/images/profile.png', $this->custom_path . $path.'/'.$idPet.'/profile.png');
            }
        }
        //Se crea el directorio para almacenar las fotos del muro
        mkdir($this->custom_path . $path.'/'.$idPet.'/wall', 0777);

        //Se crea el directorio para almacenar las fotos de la galeria
        mkdir($this->custom_path . $path.'/'.$idPet.'/gallery', 0777);

        //Se guarda la información del pedigree si se ha seleccionado que tiene.
        if(isset($data['chkPedigree'])){
            $idPedigree = Pedigree::create([
                'nombrePadre' => $data['nameFather'],
                'nombreMadre' => $data['nameMother'],
                'detalles' => $data['description']
            ]) -> id ;
            $pet = Pet::find($idPet);
            $pet -> idPedigree = $idPedigree;
            $pet -> save();
        }

        //Se crea un nuevo muro para esta mascota
        $idWall = Wall::create([
            'idMascota' => $idPet
        ])->id;
        $pet = Pet::find($idPet);
        $pet->idMuro = $idWall;
        $pet->save();

        //Se crea el mensaje de Bienvenida en el muro de la mascota
        Message::create([
            'idMuro' => $idWall,
            'idMascota' => $idPet,
            'mensaje' => "!Hoy me uno a la manada de DogBook¡"
        ]);

        //Se crea una nueva galeria para la mascota.
        Gallery::create([
            'idMascota' => $idPet
        ]);

        return redirect('/home')->with('message', 'Mascota creada correctamente');
    }

    public function getLocations(Request $request, $id)
    {
        if($request->ajax())
        {
            $locations = Location::locations($id);
            return response()->json($locations);
        }
    }

    /*
    *Devuelve por ajax el ID de la localidad para mostrarlo en la edición de la
    *mascota.
    */
    public function getLocationPet(Request $request, $id)
    {
        if($request->ajax())
        {
            $idLocation = Pet::find($id) -> idLocalidad;
            return response()->json($idLocation);
        }
    }

    public function modifyPet($id)
    {
        //Se obtinene los datos de la Mascota
        try
        {
            $pet = Pet::findOrFail($id);


        }
        catch(ModelNotFoundException $e)
        {
            return "No existe esta mascota";
        }

        //Se comprueba si esa mascota pertenece al usuario logueado
        if($pet -> idUsuario == Auth::user() -> id) {
            $provinces = Province::pluck('nombreProvincia', 'id');
            $breeds = Breed::pluck('nombreRaza', 'id');
            $companies = Company::all();
            return view('pets.modify_pet', compact('pet','provinces', 'breeds', 'companies'));
        }
        else {
            return "La mascota a la que intenta acceder no le pertenece. No seas cotilla";
        }

    }

    public function deletePet($id, Request $request)
    {
        if($request->ajax())
        {
            try {
                //Se obtine la información de la mascota
                $pet = Pet::findOrFail($id);
                //Se borran las fotos de la mascota y la galeria
                $gallery = $pet->gallery;
                Image::where('idGaleria', '=', $gallery->id)->delete();
                $gallery->delete();
                //Se borran los mensajes y el muro de la mascota
                $wall = $pet->wall;
                Message::where('idMuro', '=', $wall->id)->delete();
                Message::where('idMascota', '=', $pet->id)->delete();
                $wall->delete();
                //Eliminar pedigree
                if($pet->idPedigree != null)
                {
                    Pedigree::where('id', '=', $pet->idPedigree)->delete();
                }
                //Borrar carpeta
                $this->eliminarDir($this->custom_path . $pet->idUsuario.'/pets'.'/'.$pet->id);
                $pet->delete();

                return response()->json([
                    'message' => 'Mascota eliminada con éxito'
                ]);

            } catch (ModelNotFoundException $ex) {
                return "Ocurrió un problema al eliminar";
            }
        }
    }

    /*
    *Actualiza la información de la mascota.
    */
    public function updatePet(ModifiedPetRequest $request)
    {
        $pet = Pet::find($request -> id);
        $pet -> nombre = $request -> name;
        $pet -> edad = $request -> age;
        $pet -> sexo = $request -> sex;
        $pet -> idProvincia = $request -> province;
        $pet -> idLocalidad = $request -> location;
        $pet -> idRaza = $request -> breed;
        $pet -> save();
        return redirect('/home')->with('message', 'Mascota '.$request -> name. ' modificada correctamente');
    }

    /*
    *Devuelve la vista para modificar la información del perfil
    */
    public function modifyProfile($id)
    {
        try {
            $pet = Pet::findOrFail($id);
            $companies = Company::all();
        } catch (ModelNotFoundException $e) {
            return "No existe esta mascota";
        }

        return view('pets.modify_profile_pet', compact('pet', 'companies'));
    }

    /*
    *Sustituir imagen del perfil de la mascota.
    */
    public function modifyProfilePet(ImageRequest $request)
    {
        try {
            $pet = Pet::findOrFail($request -> id);
        } catch (ModelNotFoundException $e) {
            return "No existe esta mascota";
        }

        if($this->validPet(Auth::user() -> id, $request -> id)) {
            $this -> modifyImageProfile(Auth::user() -> id, $request);
            return redirect('/home')->with('message', 'Mascota modificada
                            correctamente');
        }
        else {
            return "Estas intentando modificar una mascota que no es suya. No seas
                    cotilla";
        }
    }

    /*
    *Devuelve el formulario para modificar el pedigree.
    */
    public function modifyPedigreePetForm($id)
    {
        if($this->validPet(Auth::user()->id, $id)) {
            $pet = Pet::find($id);
            $companies = Company::all();
            return view('pets.modify_pedigree_pet', compact('pet', 'companies'));
        }
        else {
            return "Esta mascota no te pertenece. No seas cotilla.";
        }
    }

    /*
    *Actualizar información de pedigree
    */
    public function modifyPedigreePet(ModifyPedigreeRequest $request)
    {
        if($this->validPet(Auth::user()->id, $request->id))
        {
            try
            {
                $pet = Pet::findOrFail($request->id);
                if(isset($pet->pedigree))
                {
                    $pedigree = Pedigree::find($pet->idPedigree);
                    $pedigree->nombrePadre = $request->nameFather;
                    $pedigree->nombreMadre = $request->nameMother;
                    $pedigree->detalles = $request->description;
                    $pedigree->save();
                    //return $pet;
                    return redirect('/home')->with('message', 'Pedigree de '.$pet->nombre.
                                    ' modificado correctamente');
                }
                else
                {
                    $pedigreeId = Pedigree::create([
                            'nombrePadre' => $request->nameFather,
                            'nombreMadre' => $request->nameMother,
                            'detalles' => $request->description
                    ])->id;

                    if($pedigreeId > 0)
                    {
                            $pet->idPedigree = $pedigreeId;
                            $pet->save();
                            return redirect('/home')->with('message', 'Pedigree de '.$pet->nombre.
                                            ' modificado correctamente');
                    }
                    else
                    {
                        return "No se pudo modificar el pedigree. Porfavor,
                                inténtelo más tarde.";
                    }
                }
            }
            catch (ModelNotFoundException $e) {
                return "La mascota que se intenta modificar no existe";
            }
        }
        else
        {
            return "La mascota que intenta modificar no es suya.
                    Por favor, no sea cotilla";
        }
    }

    /**
    *   Devuelve la vista de la información de la mascota
    */
    public function viewDataPet(Request $request, $id)
    {
        if($request->ajax())
        {
            try {
                $pet = Pet::findOrFail($id);
                return response()->json([View::make('pets.view_data_pet', compact('pet'))->render()]);
            } catch (ModelNotFoundException $e) {

            }

        }
    }

    /*
    *----------------------- FUNCIONES PRIVADAS -----------------------
    */

    /*
    *Comprueba que la mascota pertenece al usuario logueado
    */
    private function validPet($idUser, $idPet)
    {
        $pet = Pet::find($idPet);
        if ($pet -> idUsuario == $idUser) {
            return true;
        }
        else {
            return false;
        }
    }

    /*
    *guarda la imagen de perfil.
    */
    private function modifyImageProfile($idCurrentUser, $request)
    {
        $path = $idCurrentUser.'/pets';
        if(File::exists($this->custom_path . $path))
        {
            $request->file('image')->move($this->custom_path . $path.'/'.$request->id, 'profile.png');
        }
    }

    /*-----------METODOS PRIVADOS----------------------*/

    /*Borrar directorio recursivamente*/
    private function eliminarDir($carpeta)
    {
        foreach(glob($carpeta . '/*') as $archivos_carpeta)
        {
            //si es un directorio volvemos a llamar recursivamente
            if (is_dir($archivos_carpeta))
                $this->eliminarDir($archivos_carpeta);
            else//si es un archivo lo eliminamos
            unlink($archivos_carpeta);
        }
        rmdir($carpeta);
    }


}
