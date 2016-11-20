<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Province;
use App\Location;
use App\Breed;
use File;
use Input;
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

    public function newPet(Request $request){
        //File::makeDirectory('../../users');
        if(File::exists('../public/users'))
        {
            $request->file('image')->move('../public/users', 'guay.png');
            //Input::file('image')->move($destinationPath, $fileName);
        }
        return redirect('/home')->with('message', 'Mascota creada correctamente');
    }

    public function getLocations(Request $request, $id){
        if($request->ajax())
        {
            $locations = Location::locations($id);
            return response()->json($locations);
        }
    }
}
