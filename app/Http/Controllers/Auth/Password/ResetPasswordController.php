<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    public function index($token)
    {
        return view('auth.password.reset-password.index', [
            'token' => $token
        ]);
    }

    public function store()
    {
        dd(request()->all());
    }
}
