<?php

use Illuminate\Database\Seeder;
use App\User;
/**
 * Agregamos un usuario nuevo a la base de datos.
 */
class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'Name' => 'Jesús',
            'Surname' => 'Alegre',
            'Telephone' => '999999999',
            'User' => 'chusi',
            'Email' => 'chusi@gmail.com',
            'Password' => Hash::make('chusi') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}

