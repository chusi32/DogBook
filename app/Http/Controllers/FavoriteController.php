<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use App\Pet;
use App\Company;
use Session;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Función que devuelve la lista de favoritos de una mascota
    */
    public function index()
    {
        try
        {   $pet = Pet::findOrFail(Session::get('pet'));
            //Obtenemos la lista de mascotas favoritas de la mascota logueada
            $favorites = $pet->getPetFavorites()->get();
            //Obtenemos la información de las empresas para mostrarlas en el
            //espacio de la publicidad.
            $companies = Company::all();
            return view('favorites.favorites', compact('pet', 'favorites', 'companies'));
        }
        catch (ModelNotFoundException $e)
        {
            return "Se produjo un error: " .$e->getMessage();
        }


    }

    /**
    *   Función que añade una mascota a favoritos
    */
    public function addFavorite($id, Request $request)
    {
        if($request->ajax())
        {
            $idNewFavorite = Favorite::create([
                    'idMascota' => Session::get('pet'),
                    'idMascotaFavorito' => $id
            ])->id;

            //Se comprueba si se ha insertado correctamente.
            if ($idNewFavorite > 0) {
                return response()->json([
                    'status' => 'true',
                    'message' => 'Mascota añadida a la lista de favoritos'
                ]);
            }
            else {
                return response()->json([
                    'status' => 'false',
                    'message' => 'No se pudo añadir la mascota a su lista de favoritos. Inténtelo más tarde'
                ]);
            }
        }
    }

    /**
    *   Función que elimina una mascota de favoritos
    */
    public function deleteFavorite($id, Request $request)
    {
        if($request->ajax())
        {
            // return response()->json([
            //     'status' => 'true',
            //     'message' => $id
            // ]);
            $deleteFavorite = Favorite::where('idMascota', '=', Session::get('pet'))->where('idMascotaFavorito', '=', $id)->delete();

            //Se comprueba si se ha insertado correctamente.
            if ($deleteFavorite > 0) {
                return response()->json([
                    'status' => 'true',
                    'message' => 'Mascota eliminada de la lista de favoritos'
                ]);
            }
            else {
                return response()->json([
                    'status' => 'false',
                    'message' => 'No se pudo eliminar la mascota de la lista de favoritos. Inténtelo más tarde'
                ]);
            }
        }
    }

}
