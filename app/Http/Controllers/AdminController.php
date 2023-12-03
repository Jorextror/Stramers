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

        $user = User::query()->where('id','>',1);

        $user_data = [count($user->where('status',0)->get()),count($user->where('status',1)->get()),count($user->where('status',2)->get())];

        return view('admin.home',['data'=>json_encode($user_data)]);
    }
}
