<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Wall;
use App\Pedigree;
use App\Message;
use App\Gallery;
use Validator;
use Auth;
use Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * [Devuelve el formulario de modificación de usuario]
     * @return [type] [description]
     */
    public function getForm()
    {
        $user = Auth::user();
        return view('users.home_modify_user', ['user' => $user]);
    }

    /**
     * [Modifica el usuario]
     * @param  Request $request [Datos del formulario]
     * @return [type]           [description]
     */
    public function modifyUser(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required|max:255',
            'surname' => 'required|max:255'
            //'user' => 'required|max:255|unique:users',
            //'email' => 'required|email|max:255|unique:users'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails())
        {
            //Redirect::back()->withErrors($validator->messages())->withInput();
            return Redirect::back()->withErrors($validator->messages())->withInput();
        }
        else {
            $user = User::find($data['id']);
            $user -> name = $data['name'];
            $user -> surname = $data['surname'];
            $user -> save();
            return redirect('/home')->with('message', 'Usuario modificado correctamente');
        }

    }

    //Devuelve la vista para dar de baja un usuario
    public function deleteAccount()
    {
        return view('users.user_delete_account');
    }

    //Función que elimina un usuario
    public function deleteUser()
    {
        $user = Auth::user();
        $pets = $user->pets;
        //Se borran todas las mascotas
        foreach ($pets as $key => $value) {
            //Se borran las fotos de la mascota y la galeria
            $gallery = $value->gallery;
            Image::where('idGaleria', '=', $gallery->id)->delete();
            $gallery->delete();
            //Se borran los mensajes y el muro de la mascota
            $wall = $value->wall;
            Message::where('idMuro', '=', $wall->id)->delete();
            Message::where('idMascota', '=', $value->id)->delete();
            $wall->delete();
            //Eliminar pedigree
            if($value->idPedigree != null)
            {
                Pedigree::where('id', '=', $value->idPedigree)->delete();
            }
            //Borrar carpeta
            $this->deleteDir('../public/media/'.$value->idUsuario.'/pets'.'/'.$value->id);
            $value->delete();
        }
        $this->deleteDir('../public/media/'.$user->id);
        $user->delete();
        return redirect('/');
    }


    /*-----------METODOS PRIVADOS----------------------*/

    /*Borrar directorio recursivamente*/
    private function deleteDir($carpeta)
    {
        foreach(glob($carpeta . '/*') as $archivos_carpeta)
        {
            //si es un directorio volvemos a llamar recursivamente
            if (is_dir($archivos_carpeta))
                $this->deleteDir($archivos_carpeta);
            else//si es un archivo lo eliminamos
            unlink($archivos_carpeta);
        }
        rmdir($carpeta);
    }


}
