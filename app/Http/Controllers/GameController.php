<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Muestra la vista GameView
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('gameView');
    }
}
