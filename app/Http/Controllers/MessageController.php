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
use View;

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

    /**
    *   Función que muestra el formulario de enviar mensaje privado a otra mascota
    */
    public function getFormPrivateMessage(Request $request, $id)
    {
        if($request->ajax())
        {
            try {
                $petReceived = Pet::findOrFail($id);
                return response()->json([View::make('messages.form_private_message', compact('petReceived'))->render()]);
            } catch (ModelNotFoundException $ex) {
                return "Ocurrió un problema al preparar el mensaje";
            }

        }
    }

    //Función que inserta un nuevo mensaje privado
    public function sendPrivateMessage(Request $request)
    {
        try {
            $IdWallPetReceived = Pet::findOrFail($request->idPetReceived)->idMuro;

            $IdMessage = Message::create([
                'idMuro' => $IdWallPetReceived,
                'idMascota' => Session::get('pet'),
                'mensaje' => $request->message,
                'urlVideo' => null,
                'urlImagen' => null,
                'privado' => true
            ])->id;

            if($IdMessage > 0)
            {
                //Regresar al home
                return redirect()->back()->with('message', 'Mensaje enviado correctamente');
                // $messages = [];
                // try
                // {
                //     //Se recupera la mascota logueada
                //     $pet = Pet::findOrFail(Session::get('pet'));
                //     //Se recupera la información de la mascota que se visita
                //     $petVisit = Pet::findOrFail($request->idPetReceived);
                //     $wallMessages = $petVisit->wall->messages->where('privado', '=', 0);
                //
                //     foreach ($wallMessages as $key => $value)
                //     {
                //         $item = array();
                //         $item['idMensaje'] = $value->id;
                //         $item['idMuro'] = $value->idMuro;
                //         $item['mensaje'] = $value->mensaje;
                //         $item['fecha'] = $value->created_at;
                //         $item['imagen'] = $value->urlImagen;
                //         $item['video'] = $value->urlVideo;
                //         $item['idMascota'] = $value->idMascota;
                //         $item['nombreMascota'] = $value->pet->nombre;
                //         $item['idUsuario'] = $value->pet->idUsuario;
                //
                //         $messages[$key] = $item;
                //     }
                //     Session::put('visitPet', $request->idPetReceived);
                //     //Variable que determina si la mascota es la administradora del
                //     //muro. Creada para que se puedan borrar del muro los mensajes
                //     //que han dejado otras mascotas.
                //     $adminWall = false;
                //     $message = 'Mensaje enviado correctamente';
                //     return view('visitPet.home_visit_pet', compact('pet', 'petVisit', 'messages', 'adminWall', 'message'));
                // }
                // catch (ModelNotFoundException $e)
                // {
                //     return "No se ha encontrado la mascota a la que intenta acceder";
                // }
                //Fin regresar home
            }
            else {
                return "No se pudo guardar el mensaje. Inténtelo más tarde";
            }
        } catch (ModelNotFoundException $ex) {
            return 'Hubo un problema al insertar. Inténtelo más tarde';
        }



        // if ($request->ajax())
        // {
        //     return response()->json([
        //         'message' => $request
        //     ]);
        //     try {
        //         $IdWallPetReceived = Pet::findOrFail($request->idPetReceived)->idMuro;
        //
        //         $IdMessage = Message::create([
        //             'idMuro' => $IdWallPetReceived,
        //             'idMascota' => Session::get('pet'),
        //             'mensaje' => $request->message,
        //             'urlVideo' => null,
        //             'urlImagen' => null,
        //             'privado' => true
        //         ])->id;
        //
        //         if($IdMessage > 0)
        //         {
        //             dd($IdMessage);
        //             return response()->json([
        //                 "Mensaje enviado"
        //             ]);
        //         }
        //         else {
        //             return response()->json([
        //                 "No se pudo guardar el mensaje. Inténtelo más tarde"
        //             ]);
        //         }
        //     } catch (ModelNotFoundException $ex) {
        //         return response()->json([
        //             'message' => 'Hubo un problema al insertar. Inténtelo más tarde'
        //         ]);
        //     }
        // }
    }
}
