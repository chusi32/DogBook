<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Pet;
use App\User;
use Auth;

class HomePetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homePet($id)
    {
        if($this->validPet(Auth::user()->id,$id))
        {
            try
            {
                $pet = Pet::findOrFail($id);
                return view('wall.wall', compact('pet'));
            }
            catch (ModelNotFoundException $e)
            {
                return "No se ha encontrado la mascota con la que ha intentado acceder";
            }
        }
        else
        {
            return "Esta mascota no le pertenece. No sea cotilla.";
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
}
