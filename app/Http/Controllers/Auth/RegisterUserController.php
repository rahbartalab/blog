<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        User::create($request->validated());

        return redirect()->route('login.index');
    }
}
