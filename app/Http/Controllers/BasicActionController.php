<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicActionController extends Controller
{
    //
    //
    /**
     * [Redirige a la vista anterior]
     * @return [type] [description]
     */
    public function goBack()
    {
        return redirect()->back();
    }
}
