<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExitoController extends Controller
{
    public function procesar(Request $request)
    {
        return view('exito');
    }
}
