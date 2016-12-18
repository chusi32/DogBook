<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Message;
use Auth;
use Validator;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\redirect;
use App\Http\Controllers\WallController;
use App\Http\Controllers\VisitController;
use Session;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Inserta un nuevo mensaje en el muro.
    */
    public function newWallMessage(Request $request)
    {
        //Se crean las reglas de validación dependiendo de los datos que se envien

        $rules = [];
        if(!empty($request->message))
        {
            $rules['message'] = 'max:500';
        }
        if(!empty($request->image))
        {
            $rules['image'] = 'mimes:jpeg,bmp,png';
        }
        if (!empty($request->video))
        {
            $rules['video'] = 'max:500';
        }
        //Se validan los datos.
        $validator = Validator::make($request->all(), $rules);
        if($validator -> fails()) {
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
        //Se guarda el mensaje
        $idMessage = Message::create([
            'idMuro' => $request->idWall,
            'idMascota' => $request->idPet,
            'mensaje' => $request->message,
            'urlVideo' => (empty($request->video) ? null : $request->video),
            'urlImagen' => (isset($request->image) ? $request->image->getClientOriginalName() : null),
            'privado' => 0
        ])->id;

        //Se comprueba si se ha insertado;
        if($idMessage > 0)
        {
            if(!empty($request->image))
            {
                $pet = Pet::find($request->idPet);
                $request->file('image')->move('../public/media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/wall', $request->image->getClientOriginalName());

                //return $this->getWallPet($request->idPet);
            }

            //Se comprueba si la mascota escribe en su muro o no para redirigir a un sitio u otro
            try
            {

                $petValidateWall = Pet::findOrFail($request->idPet);
                if($petValidateWall->idMuro == $request->idWall)
                {
                    $wall = new WallController();
                    return $wall->getWallPet(Session::get('pet'));
                }
                else
                {
                    $visitWall = new VisitController();
                    return $visitWall->homeVisit(Session::get('visitPet'));
                }
            } catch (ModelNotFoundException $ex) {
                return "Error. Inténtelo mas tarde.";
            }


            // return view('visitPet.home_visit_pet', compact('pet', 'petVisit', 'messages'));
            //return $this->getWallPet($request->idPet);
        }
        else
        {
            return 'Hubo un problema. Inténtelo más tarde';
        }

    }

    /**
    *   Función que elimina un mensaje del muro
    */
    public function deleteMessageWall($id, Request $request)
    {
        if($request->ajax())
        {
            $message = Message::find($id);
            $pet = $message->pet;
            if(!is_null($message->urlImagen))
            {
                unlink('../public/media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/wall'.'/'.$message->urlImagen);
            }
            $message->delete();
            return response()->json([
                'message' => 'Mensaje eliminado con éxito'
            ]);
        }
    }
}
