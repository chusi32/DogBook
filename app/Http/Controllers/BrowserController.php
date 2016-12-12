<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Province;
use App\Breed;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use View;
use Auth;

class BrowserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Función que devuelve la vista del buscador
    */
    public function index()
    {
        try
        {
            $pet = Pet::findOrFail(Session::get('pet'));
            $provinces = Province::pluck('nombreProvincia', 'id');
            $breeds = Breed::pluck('nombreRaza', 'id');
            return view('browser.browser', compact('pet', 'provinces', 'breeds'));
        }
        catch (ModelNotFoundException $e)
        {
            return "Se produjo un error: " .$e->getMessage();
        }


    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $pets = Pet::name($request->name)->where('idUsuario', '!=', Auth::user()->id)->get();//->paginate(1);
            $where = [];

            // if($request->name != "")
            // {
            //     $pets = $pets->where('nombre', 'like', '%'.$request->name.'%')->get();
            // }

            $view = View::make('browser.searchList', compact('pets'));
            $content = $view->render();
            // $message = Message::find($id);
            // $pet = $message->pet;
            // if(!is_null($message->urlImagen))
            // {
            //     unlink('../public/media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/wall'.'/'.$message->urlImagen);
            // }
            // $message->delete();
            return response()->json([
                'message' => $content
            ]);
        }
    }
}
