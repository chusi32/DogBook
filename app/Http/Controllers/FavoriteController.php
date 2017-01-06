<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
    *   Función que añade una mascota a favoritos
    */
    public function deleteMessageWall($id, Request $request)
    {
        if($request->ajax())
        {
            $idNewFavorite = Favorite::create([
                    'idMascota' => Session::get('pet'),
                    'idMascotaFavorito' => $id
            ])->id;

            
            return response()->json([
                'message' => 'Mensaje eliminado con éxito'
            ]);
        }
    }
}
