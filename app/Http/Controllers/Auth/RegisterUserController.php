<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;
use function redirect;
use function view;

class RegisterUserController extends Controller
{


    public function index()
    {


        return view('auth.register');
    }


    public function store(RegisterUserRequest $request)
    {
        $user = User::create([
            "first_name" => $request['first_name'],
            "last_name" => $request['last_name'],
            "email" => $request['email'],
            "password" => Hash::make($request['password'])
        ]);



        return redirect('login');
    }
}
