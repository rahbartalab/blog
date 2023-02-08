<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\ForgotPasswordRequest;
use Illuminate\Auth\Notifications\ResetPassword;
use PharIo\Version\Exception;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.password.forgot-password.index');
    }

    public function store(ForgotPasswordRequest $request)
    {
        try {
            \Illuminate\Support\Facades\Password::sendResetLink(
                $request->only('email')
            );

        } catch (Exception $exception) {
            return redirect()->route('forgot-password.index')->with(['error' => 'unexpected error!']);
        }
        return redirect()
            ->route('forgot-password.index')
            ->with(['message' => 'ایمیل بازیابی رمز عبور برای شما ارسال شد.']);
    }
}
