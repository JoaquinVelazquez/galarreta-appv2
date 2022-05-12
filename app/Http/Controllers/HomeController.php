<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        /* DEVUELVE LA VISTA DE INICIO */
        return view('inicio');
    }
}
