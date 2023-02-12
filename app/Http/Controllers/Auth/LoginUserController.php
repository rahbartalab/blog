<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request)
    {
        try {
            if (Auth::attempt($request->validated())) {
                $request->session()->regenerate();

                return redirect()->route('dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');

        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return redirect()->route('login.index')->with(['error' => 'unexpected error!']);
        }

    }
}
