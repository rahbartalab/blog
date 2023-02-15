<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
            $user = User::create($request->validated());
            event(new Registered($user));
        } catch (\Exception $exception) {
            return redirect()->route('register.index')->with(['error' => 'unexpected error!']);
        }

        return redirect()->route('login.index')->with(['registerMessage' => 'ثبت نام شما با موفقیت انجام شد.']);
    }
}
