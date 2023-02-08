<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureEmailIsNotVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
    {
        if ($request->user() and (
                !$request->user() instanceof MustVerifyEmail ||
                ($request->user() instanceof MustVerifyEmail and $request->user()->hasVerifiedEmail()))) {
            return $request->expectsJson()
                ? Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'))
                : abort(403, 'شما قبلا ایمیل خود را تایید کرده اید.');
        }
        return $next($request);
    }
}
