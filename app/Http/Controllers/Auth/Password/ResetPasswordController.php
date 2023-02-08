<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use PharIo\Version\Exception;

class ResetPasswordController extends Controller
{
    public function index($token)
    {
        return view('auth.password.reset-password.index', [
            'token' => $token
        ]);
    }

    public function store(ResetPasswordRequest $request)
    {
        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => $password
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => 'unexpected error!']);
        }


        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login.index')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);

    }
}
