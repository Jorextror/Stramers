<?php

namespace App\Http\Controllers;

use App\Custom\Carta\Carta;
use Illuminate\Http\Request;

class TiendaController extends Controller
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
     * Muestra la vista Tienda
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tienda');
    }

     /**
     * Muestra la vista Tienda
     *
     */
    //FIX reparar error 409
    public function sobre(Request $request)
    {
        return "hola";
    }

}
