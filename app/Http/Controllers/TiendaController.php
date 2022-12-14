<?php

namespace App\Http\Controllers;

use App\Custom\Carta\Carta;
use App\Models\Card;
use App\Models\User;
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
     * @param Request
     * @return Array Cartas aleatorias según el mazo pasado por request
     *
     */
    public function sobre(Request $request)
    {
        return Carta::genera_sobre($request)['value'];
    }

    /**
     * @param Request
     * @return Bool
     */
    public function addCardToUser(Request $request)
    {
        return User::AddCard($request);
    }


}
