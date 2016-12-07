<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers\redirect;
use App\Pet;
use App\User;
use App\Message;
use Auth;
use Validator;
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
                return view('wall.wall', compact('pet','messages'));
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
                //return 'Se ha guardado';//return redirect('/home')->with('message', 'Mascota creada correctamente');
                return $this->getWallPet($request->idPet);
            }
            return $this->getWallPet($request->idPet);
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
