<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');

    }

    public function index()
    {

        $desconectados = User::query()->where('id','>',0)->where('status',0)->count();
        $conectados = User::query()->where('id','>',0)->where('status',1)->count();
        $jugando = User::query()->where('id','>',0)->where('status',2)->count();

        $user_status_count = [$desconectados, $conectados, $jugando];

        return view('admin.home',['data'=>json_encode($user_status_count)]);
    }
}
