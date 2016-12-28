<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use File;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
    *   Constante para el path a media
    */
    protected $custom_path = '../public/media/'; //->Desarrollo
    //protected $custom_path = '../public_html/media/'; //->Producción

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'user' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $idUser =  User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'user' => $data['user'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]) -> id;

        if($idUser > 0) {
            if(!File::exists($this->custom_path)) {
                return false;
            }
            else {
                if(!mkdir($this->custom_path . $idUser, 0777)){
                    return false;
                }
                mkdir($this->custom_path . $idUser.'/pets', 0777);

                return User::find($idUser);
            }
        }
        else {
            return 'No se pudo crear el usuario. Intentelo más tarde';
        }

    }
}
