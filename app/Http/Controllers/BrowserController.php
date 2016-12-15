<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Province;
use App\Breed;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
                $pets = Pet::name($request->name)
                        ->sex($request->chkSex, $request->sex)
                        ->breed($request->chkBreed, $request->breed)
                        ->localization($request->chkProvince, $request->province, $request->location)
                        ->where('idUsuario', '!=', Auth::user()->id)->paginate(1);//->get()

                return response()->json([View::make('browser.searchList', compact('pets'))->render()]);






            // $view = View::make('browser.searchList', compact('pets'));
            // $content = $view->render();
            //
            // return response()->json([
            //     'partial' => $content
            // ]);

        }
    }
}
