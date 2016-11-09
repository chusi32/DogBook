<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $id = Auth::id();
        $user = Auth::user();
        //$user = Auth::user();
        $mas = Auth::user()->pets;
        //$mascotas = $mas->nombre;
        return view('home.home',['user' => $user]);
    }
}
