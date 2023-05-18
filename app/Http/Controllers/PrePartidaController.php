<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PrePartidaController extends Controller
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

    public function getInMatchMaking(Request $request)
    {
        if ($request->has('nick'))
        {
            $user = User::query()->where('nick',$request->input('nick'))->first();
            $other = $user->get_match_user($user);
            return $other;
        }
    }

}
