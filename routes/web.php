<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**
 * Ruta inicial
 * */
Route::get('/', function () {
    return view('info.welcome');
});
/**
 * Rutas para Info
 */
Route::get('/privacy', function () {
    return view('info.privacy');
});

Route::get('/me', function () {
    return view('info.me');
});

Route::get('/description', function () {
    return view('info.description');
});

/**
 * Rutas para Logueo y Registro
 */
Auth::routes();

/**
 * Ruta para Home
 */
Route::get('/home', 'HomeController@index');
