<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
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
        try {
            User::create($request->validated());
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('register.index')->with(['error' => 'unexpected error!']);
        }

        return redirect()->route('login.index');
    }
}
