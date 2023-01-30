<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterUserRequest;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{


    public function index()
    {


        return view('auth.register');
    }


    public function store(RegisterUserRequest $request)
    {
        dd($request);
    }
}
