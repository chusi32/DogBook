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
 * Acciones comunes
 */
Route::get('/goBack', 'BasicActionController@goBack');

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

/**
 * Rutas para mascotas
 */
Route::get('/newPet', 'PetController@getForm');
Route::post('/newPet', 'PetController@newPet');
Route::get('/locations/{id}', 'PetController@getLocations');
Route::get('/modifyPet/{id}', 'PetController@modifyPet');
Route::post('/updatePet',[
    'as' => 'updatePet',
    'uses' => 'PetController@updatePet'
]);
Route::get('/modifyProfile/{id}', 'PetController@modifyProfile');
Route::post('/modifyProfilePet',[
    'as' => 'modifyProfilePet',
    'uses' => 'PetController@modifyProfilePet'
]);
Route::get('/deletePet/{id}', 'PetController@deletePet');
Route::get('getLocationPet/{id}', 'PetController@getLocationPet');

/**
 * Ruta para modificar usuario
 */
Route::get('/modifyUser', 'UserController@getForm');
Route::post('/modifyUser', 'UserController@modifyUser');
