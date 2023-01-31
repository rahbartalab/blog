<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
        $user = $request->except('password_confirmation');
        User::create($user);
        Mail::to($user['email'])->send(new RegisterMail());


        return redirect('login');
    }
}
