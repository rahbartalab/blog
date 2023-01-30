<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterUserController extends Controller
{


    public function index()
    {


        return view('auth.register');
    }


    public function store(RegisterUserRequest $request)
    {
        $user = $request->except('password_confirmation');
        User::create($user);
        Mail::to($user['email'])->send(new RegisterMail());


        return redirect('register');
    }
}
