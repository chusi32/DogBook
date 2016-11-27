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
use File;
use Input;
use Validator;
use Redirect;
use App\Http\Requests\ModifiedPetRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\ModifyPedigreeRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PetController extends Controller
{
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
            'idProvincia' =>  $data['province'],
            'idLocalidad' =>  $data['location'],
            'idRaza' =>  $data['breed']
        ]) -> id;

        //Se guarda la foto de perfil. Si no se ha seleccionado ninguna,
        //se pone la de defecto.
        $path = $currentUser->id.'/pets';
        if(File::exists('../public/media/'.$path))
        {
            mkdir('../public/media/'.$path.'/'.$idPet, 0777);
            if(isset($data['image'])) {
                $request->file('image')->move('../public/media/'.$path.'/'.$idPet, 'profile.png');
            }
            else {
                copy('../public/resources/images/profile.png', '../public/media/'.$path.'/'.$idPet.'/profile.png');
            }
        }
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
            return view('pets.modify_pet', compact('pet','provinces', 'breeds'));
        }
        else {
            return "La mascota a la que intenta acceder no le pertenece. No seas cotilla";
        }

    }

    public function deletePet($id)
    {
        // TODO:: Falta hacer la funcionalidad.
    }

    /*
    *Actualiza la información de la mascota.
    */
    public function updatePet(ModifiedPetRequest $request)
    {
        $pet = Pet::find($request -> id);
        $pet -> nombre = $request -> name;
        $pet -> edad = $request -> age;
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
        } catch (ModelNotFoundException $e) {
            return "No existe esta mascota";
        }

        return view('pets.modify_profile_pet', compact('pet'));
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
            // if($pet->idPedigree == NULL){
            //     $pet->idPedigree = 0001;
            // }
            return view('pets.modify_pedigree_pet', compact('pet'));
        }
        else {
            return "Esta mascota no te pertenece. No seas cotilla.";
        }
    }

    public function modifyPedigreePet(ModifyPedigreeRequest $request)
    {
        if($this->validPet(Auth::user()->id, $request->id))
        {
            try
            {
                $pet = Pet::findOrFail($request->id);
                if(isset($pet->pedigree)) {
                    $pedigree = Pedigree::find($pet->idPedigree);
                    $pedigree->nombrePadre = $request->nameFather;
                    $pedigree->nombreMadre = $request->nameMother;
                    $pedigree->detalles = $request->description;
                    $pedigree->save();
                    //return $pet;
                    return redirect('/home')->with('message', 'Pedigree de '.$pet->nombre.
                                    ' modificado correctamente');
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

    /*
    *----------------------- FUNCIONES PRIVADAS -----------------------
    */

    /*
    *Comprueba que la mascota pertenece al usuario logueado
    */
    private function validPet($idUser, $idPet)
    {
        $pet = Pet::find($idPet);
        if ($pet -> idUsuario === $idUser) {
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
        if(File::exists('../public/media/'.$path))
        {
            $request->file('image')->move('../public/media/'.$path.'/'.$request->id, 'profile.png');
        }
    }
}
