<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{


    public function index()
    {


        return view('auth.register');
    }


    public function store(Request $request)
    {
        dd($request);
    }
}
