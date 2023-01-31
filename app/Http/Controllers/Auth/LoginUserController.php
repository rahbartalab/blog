<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store()
    {



    }
}
