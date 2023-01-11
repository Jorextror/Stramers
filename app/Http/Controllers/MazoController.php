<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MazoController extends Controller
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
     * Devuelve la vista mazos
     *
     * @return view
     */
    public function index()
    {
        return view('mazos', [
            'mazos'=> Auth::user()->decks
        ]);
    }
    /**
    * Devuelve la vista createMazo
    *
    * @return view
    */
   public function new()
   {
       return view('createMazo', ['cartas'=>Auth::user()->cards]);
   }

    /**
    * Crea el mazo para el usuario
    *
    * @return view
    */
   public function add(Request $request)
   {
    if ($request->hasAny('cards')) {
        return Deck::create($request);
    }
       return null;
   }
}
