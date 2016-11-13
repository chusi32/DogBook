<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Province;
use App\Location;
use App\Breed;

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
        return redirect('/home')->with('message', 'store');
    }

    public function getLocations(Request $request, $id){
        if($request->ajax())
        {
            $locations = Location::locations($id);
            return response()->json($locations);
        }
    }
}
