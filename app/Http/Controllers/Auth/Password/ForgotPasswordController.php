<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.password.forgot-password.index');
    }

    public function store(ForgotPasswordRequest $request)
    {
        \Illuminate\Support\Facades\Password::sendResetLink(
            $request->only('email')
        );
        return redirect()
            ->route('forgot-password.index')
            ->with(['message' => 'ایمیل بازیابی رمز عبور برای شما ارسال شد.']);
    }
}
