<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class VerificationEmailController extends Controller
{
    public function verify(\Illuminate\Foundation\Auth\EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect(\route('dashboard'));
    }
}
