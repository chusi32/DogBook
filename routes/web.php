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
Route::get('/modifyPedigreePetForm/{id}', 'PetController@modifyPedigreePetForm');
Route::post('/modifyPedigreePet',[
    'as' => 'modifyPedigreePet',
    'uses' => 'PetController@modifyPedigreePet'
]);
Route::delete('/deletePet/{id}', [
    'as' => 'deletePet',
    'uses' => 'PetController@deletePet'
]);
Route::get('getLocationPet/{id}', 'PetController@getLocationPet');

/**
 * Ruta para modificar usuario
 */
Route::get('/modifyUser', 'UserController@getForm');
Route::post('/modifyUser', 'UserController@modifyUser');
Route::get('/deleteAccount', 'UserController@deleteAccount');
Route::get('/deleteUser', 'UserController@deleteUser');

/**
* Ruta para el home de la mascota.
*/
Route::get('/wall/{id}', 'WallController@getWallPet');

Route::post('/saveImage', [
    'as' => 'saveImage',
    'uses' => 'GalleryController@saveImage'
]);

/**
*   Rutas para los mensajes
*/
Route::get('/getPrivateMessages', 'MessageController@getPrivateMessages');
Route::post('/newMessage', [
    'as' => 'newMessage',
    'uses' => 'MessageController@newWallMessage'
]);
Route::delete('/deleteMessageWall/{id}', [
    'as' => 'deleteMessageWall',
    'uses' => 'MessageController@deleteMessageWall'
]);
Route::post('/deleteAllPrivateMessages', [
    'as' => 'deleteAllPrivateMessages',
    'uses' => 'MessageController@deleteAllPrivateMessages'
]);



/**
*   Ruta para la galeria de imágenes
*/
Route::get('/getGallery', 'GalleryController@index');
Route::delete('/deleteImageGallery/{id}', [
    'as' => 'deleteImageGallery',
    'uses' => 'GalleryController@deleteImageGallery'
]);

/**
*   Ruta para el buscador
*/
Route::get('/browser', 'BrowserController@index');
Route::post('/search', [
    'as' => 'search',
    'uses' => 'BrowserController@search'
]);

/**
*   Rutas para las mascotas que se visitan
*/
Route::get('/visit/{id}', 'VisitController@homeVisit');
Route::get('/visitGallery/{id}', 'GalleryController@visitIndex');
Route::get('/viewDataPet/{id}', 'PetController@viewDataPet');
Route::get('/getFormPrivateMessage/{id}', 'MessageController@getFormPrivateMessage');
Route::post('/sendPrivateMessage', [
    'as' => 'sendPrivateMessage',
    'uses' => 'MessageController@sendPrivateMessage'
]);
Route::post('/respondPrivateMessage', [
    'as' => 'respondPrivateMessage',
    'uses' => 'MessageController@respondPrivateMessage'
]);

/**
*   Rutas para los favoritos
*/
Route::post('/addFavorite/{id}', [
    'as' => 'addFavorite',
    'uses' => 'FavoriteController@addFavorite'
]);
