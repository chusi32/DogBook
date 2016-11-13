<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function getForm()
    {
        $provinces = Provinces::lists('nombreProvincia', 'id');
        return view('pets.new_pet', compact($provinces))
    }

    public function newPet(Request $request){
        return redirect('/home')->with('message', 'store');
    }
}
