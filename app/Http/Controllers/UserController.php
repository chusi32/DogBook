<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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


}
