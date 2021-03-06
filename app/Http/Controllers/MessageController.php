<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Message;
use App\Company;
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
    /**
    *   Constante para el path a media
    */
    protected $custom_path = '../public/media/'; //->Desarrollo
    //protected $custom_path = '../public_html/media/'; //->Producción

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
                $request->file('image')->move($this->custom_path . $pet->idUsuario.'/pets'.'/'.$pet->id.'/wall', $request->image->getClientOriginalName());

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
                unlink($this->custom_path . $pet->idUsuario.'/pets'.'/'.$pet->id.'/wall'.'/'.$message->urlImagen);
            }
            $message->delete();
            return response()->json([
                'message' => 'Mensaje eliminado con éxito'
            ]);
        }
    }

    /**
    *   Eliminar todos los mensajes privados
    */
    public function deleteAllPrivateMessages(Request $request)
    {
        if($request->ajax())
        {
            try {
                $pet = Pet::findOrFail($request->idPet);
                $wallPet = $pet->wall->id;
                $wall = $pet->wall;
                $messages = $wall->privateMessages;
                $filasAfectadas = Message::where('privado', '=', 1)->where('idMuro', '=', $wallPet)->delete();
                //$messages = $petWall->privateMessages;
                // $messages->delete();
                //
                // foreach ($messages as $key => $value) {
                //
                //     $value->delete();
                // }

                //$deletes = Message::where('idMuro' , '=', $petWall->id)->where('privado', '=', 1)->delete();

                // if($messages > 0)
                // {
                    return response()->json([
                        'message' => $request->idPet//'Se han borrado todos los mensajes'
                    ]);
                // }
            } catch (ModelNotFoundException $ex) {
                return "Ocurrió un problema al borrar los mensajes. Inténteló mas tarde";
            }
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
        else {
            //Si la petición se realiza desde el botón de responder mensaje
            try {
                $pet = Pet::findOrFail(Session::get('pet'));
                $petReceived = Pet::findOrFail($id);
                $companies = Company::all();
                return view('messages.respond_private_message', compact('pet', 'petReceived', 'companies'));
            } catch (ModelNotFoundException $ex) {
                return "Ocurrió un problema al preparar el mensaje";
            }
        }
    }

    /**
    *   Función que inserta un nuevo mensaje privado
    */
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
            }
            else {
                return "No se pudo guardar el mensaje. Inténtelo más tarde";
            }
        } catch (ModelNotFoundException $ex) {
            return 'Hubo un problema al insertar. Inténtelo más tarde';
        }
    }

    /**
    *   Función para guardar la respuesta del mensaje privado
    */
    public function respondPrivateMessage(Request $request)
    {
        try {
            $pet = Pet::findOrFail(Session::get('pet'));

            $IdWallPetReceived = Pet::findOrFail($request->idPetReceived)->idMuro;

            $IdMessage = Message::create([
                'idMuro' => $IdWallPetReceived,
                'idMascota' => $pet->id,
                'mensaje' => $request->message,
                'urlVideo' => null,
                'urlImagen' => null,
                'privado' => true
            ])->id;

            if($IdMessage > 0)
            {
                //Regresar a los mensajes
                try {
                    $pet = Pet::findOrFail(Session::get('pet'));
                    $messages = $pet->wall->privateMessages()->paginate(5);
                    $companies = Company::all();
                    $message = "Mensaje respondido";
                    return view('messages.private_message_pet', compact('pet', 'message', 'messages', 'companies'));
                } catch (ModelNotFoundException $ex) {
                    return "No se pudo abrir la bandeja de entrada. Inténtelo más tarde";
                }
            }
            else {
                return "No se pudo enviar el mensaje. Inténtelo más tarde";
            }
        } catch (ModelNotFoundException $ex) {
            return 'Hubo un problema al enviar el mensaje. Inténtelo más tarde';
        }
    }

    /**
    *   Funcion que muestra la vista de los mensajes privados
    */
    public function getPrivateMessages()
    {
        try {
            $pet = Pet::findOrFail(Session::get('pet'));
            $companies = Company::all();
            $messages = $pet->wall->privateMessages()->paginate(5);
            return view('messages.private_message_pet', compact('pet', 'messages', 'companies'));
        } catch (ModelNotFoundException $ex) {
            return "No se pudo abrir la bandeja de entrada. Inténtelo más tarde";
        }

    }


}
