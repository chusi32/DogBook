<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Pet;
use App\Gallery;
use Auth;
use Session;
use App\Http\Requests\ImageRequest;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Función que devuelve las imágenes de la galeria de una mascota
    */
    public function index()
    {
        $pet = Pet::find(Session::get('pet'));
        $gallery = $pet->gallery;
        $images = $gallery->images;
        return view('gallery.gallery', compact('pet', 'images'));


    }

    /**
    *   Función que guarda una imagen nueva en la galeria
    */
    public function saveImage(ImageRequest $request)
    {

        try {
            $pet = Pet::findOrFail(session::get('pet'));
            $gallery = $pet->gallery;

        } catch (ModelNotFoundException $e) {
            return "No existe esta mascota";
        }

        if($this->validPet(Auth::user()->id, $pet->id))
        {
            //Se comprueba si se ha podido guardar la imágen
            if($request->file('image')->move('../public/media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/gallery', $request->image->getClientOriginalName()))
            {
                $pathImage = 'media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/gallery'.'/';
                //Se guarda y se comprueba si se ha guardado la información de la imágen en la base de datos
                $idImage = Image::create([
                    'idGaleria' => $gallery->id,
                    'ruta' => $pathImage,
                    'imagen' => $request->image->getClientOriginalName(),
                    'titulo' => null
                ])->id;

                if($idImage > 0)
                {
                    return $this->index(session::get('pet'));
                }
                else {
                    unlink($patImage.''.$request->image->getClientOriginalName());
                    return "No se pudo guardar la imágen. Inténtalo más tarde";
                }
            }
            else
            {
                return "No se pudo guardar la imágen. Inténtalo más tarde";
            }

            return redirect('/home')->with('message', 'Mascota modificada
                            correctamente');
        }
        else {
            return "Estas intentando modificar una mascota que no es suya. No seas
                    cotilla";
        }
    }


    /*
    *----------------------- FUNCIONES PRIVADAS -----------------------
    */

    /*
    *Comprueba que la mascota pertenece al usuario logueado
    */
    private function validPet($idUser, $idPet)
    {
        $pet = Pet::find($idPet);
        if ($pet -> idUsuario === $idUser) {
            return true;
        }
        else {
            return false;
        }
    }
}