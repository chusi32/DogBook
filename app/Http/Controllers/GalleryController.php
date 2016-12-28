<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Pet;
use App\Gallery;
use App\Company;
use Auth;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ImageRequest;
use View;

class GalleryController extends Controller
{
    /**
    *   Constante para el path a media
    */
    protected $custom_path = '../public/media/'; //->Desarrollo
    //protected $custom_path = '../public_html/media/'; //->Producción

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Función que devuelve las imágenes de la galeria de una mascota
    */
    public function index()
    {
        $companies = Company::all();
        $pet = Pet::find(Session::get('pet'));
        $gallery = $pet->gallery;
        $images = Image::where('idGaleria', '=', $gallery->id)->paginate(1);
        $adminGallery = true;
        return view('gallery.gallery', compact('pet', 'images', 'companies', 'adminGallery'));
        // $pet = Pet::find(Session::get('pet'));
        // $gallery = $pet->gallery;
        // $images = $gallery->images;
        // return view('gallery.gallery', compact('pet', 'images'));
    }

    /**
    *   Función que devuelve la galeria de la mascota a la que se visita
    */
    public function visitIndex(Request $request, $id)
    {
        if($request->ajax())
        {
            try {
                $pet = Pet::findorFail($id);
                $gallery = $pet->gallery;
                $adminGallery = false;
                $images = Image::where('idGaleria', '=', $gallery->id)->paginate(1);

                return response()->json([View::make('gallery.images', compact('images', 'adminGallery'))->render()]);

            } catch (ModelNotFoundException $e) {
                return "Ocurrio un problema en la galeria. Inténtelo más tarde";
            }
        }

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
            if($request->file('image')->move($this->custom_path . $pet->idUsuario.'/pets'.'/'.$pet->id.'/gallery', $request->image->getClientOriginalName()))
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
                    // $images = $gallery->images;
                    // $view = View::make('gallery.images')->with('images', $images)
                    //                                     ->with('pet', $pet);
                    // return $view->renderSections()['galeria'];
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

            // return redirect('/home')->with('message', 'Mascota modificada
            //                 correctamente');
        }
        else {
            return "Estas intentando modificar una mascota que no es suya. No seas
                    cotilla";
        }
    }

    /**
    *   Función que elimina una imágen de la galeria
    */
    public function deleteImageGallery($id, Request $request)
    {
        if($request->ajax())
        {
            // return response()->json([
            //     'message' => $id
            // ]);
            try
            {
                $image = Image::findOrFail($id);
                $pet = Pet::findOrFail(Session::get('pet'));
            }
            catch(ModelNotFoundException $e)
            {
                return response()->json([
                    'message' => "Ocurrió un error: ".$e->getMessage()
                ]);
            }

            if(unlink('../public/media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/gallery'.'/'.$image->imagen))
            {
                $image->delete();
                return response()->json([
                    'message' => 'Imágen eliminada con éxito'
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'La imágen no pudo borrarse. Inténtalo más tarde'
                ]);
            }
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
