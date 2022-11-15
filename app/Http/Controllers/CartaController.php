<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Custom\Carta\Facades\CartaFacade;


class CartaController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $card;
    public function __construct(Card $card)
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
        $this->card = $card;
    }

     /**
     * Devuelve la vista carta
     *
     * @return view
     */
    public function index()
    {
        return view('carta');
    }

     /**
     * Recibe request valida con el Facade Carta y guarda carta en BBDD
     *
     * @return view
     */

    public function newCard(Request $request)
    {
        $respuesta = CartaFacade::validateCard($request);
        //Error 406 = no aceptable
        if($respuesta["status"]===406){
            return redirect('carta')
            ->withErrors($respuesta["value"])
            ->withInput();
        }
        $status = $this->card->set_new_card($respuesta["value"])["status"];
        if ($status!==200) {
            return view('carta',["failed"=>"An error was ocurred"]);
        }
        return view('carta',["success"=>"Card added succesfully"]);
    }
}
