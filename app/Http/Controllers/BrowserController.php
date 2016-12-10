<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Province;
use App\Breed;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrowserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Función que devuelve la vista del buscador
    */
    public function index()
    {
        try
        {
            $pet = Pet::findOrFail(Session::get('pet'));
            $provinces = Province::pluck('nombreProvincia', 'id');
            $breeds = Breed::pluck('nombreRaza', 'id');
            return view('browser.browser', compact('pet', 'provinces', 'breeds'));
        }
        catch (ModelNotFoundException $e)
        {
            return "Se produjo un error: " .$e->getMessage();
        }


    }
}
