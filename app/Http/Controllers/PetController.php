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
//use illuminate\Support\Facades\Validator;


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
}
