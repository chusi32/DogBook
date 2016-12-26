<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Company;
use Session;


class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Función que carga la página de visitas a una mascota y muestra sus mensajes del muro
    public function homeVisit($id)
    {
        $messages = [];
        try
        {
            //Se recupera la mascota logueada
            $pet = Pet::findOrFail(Session::get('pet'));
            $companies = Company::all();
            //Se recupera la información de la mascota que se visita
            $petVisit = Pet::findOrFail($id);
            $wallMessages = $petVisit->wall->messages->where('privado', '=', 0);

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
            Session::put('visitPet', $id);
            //Variable que determina si la mascota es la administradora del
            //muro. Creada para que se puedan borrar del muro los mensajes
            //que han dejado otras mascotas.
            $adminWall = false;
            return view('visitPet.home_visit_pet', compact('pet', 'petVisit', 'messages', 'adminWall', 'companies'));
        }
        catch (ModelNotFoundException $e)
        {
            return "No se ha encontrado la mascota a la que intenta acceder";
        }
    }
}
