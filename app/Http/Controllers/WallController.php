<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Pet;
use App\User;
use Auth;
use Session;

class WallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Obtiene los mensajes del muro de una mascota
    */
    public function getWallPet($id)
    {
        if($this->validPet(Auth::user()->id,$id))
        {
            $messages = [];
            try
            {
                $pet = Pet::findOrFail($id);
                $wallMessages = $pet->wall->messages->where('privado', '=', 0);

                foreach ($wallMessages as $key => $value)
                {
                    $item = array();
                    $item['idMensaje'] = $value->id;
                    $item['idMuro'] = $value->idMuro;
                    $item['mensaje'] = $value->mensaje;
                    $item['fecha'] = $value->created_at;
                    $item['imagen'] = $value->urlImagen;
                    $item['video'] = $value->urlVideo;
                    $item['idMascota'] = $value->idMascota;
                    $item['nombreMascota'] = $value->pet->nombre;
                    $item['idUsuario'] = $value->pet->idUsuario;

                    $messages[$key] = $item;
                }
                Session::put('pet', $id);

                //Variable que determina si la mascota es la administradora del
                //muro. Creada para que se puedan borrar del muro los mensajes
                //que han dejado otras mascotas.
                $adminWall = true;


                return view('wall.wall', compact('pet','messages', 'adminWall'));
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
        if ($pet -> idUsuario === $idUser) {
            return true;
        }
        else {
            return false;
        }
    }
}
