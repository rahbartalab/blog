@extends('layouts.app')
<div class="text-center flex gap-6 mx-auto justify-center mt-5">
    @guest('web')
        <div>
            <a href="{{ route('register.index') }}">
                <button class="bg-slate-700 text-white px-4 py-2 rounded">Register</button>
            </a>
        </div>


        <div>
            <a href="{{ route('login.index') }}">
                <button class="bg-slate-700 text-white px-4 py-2 rounded">Login</button>
            </a>
        </div>
    @endguest
    @auth('web')
        <a class="bg-slate-700 rounded px-12 py-2 text-white" href="{{ route('dashboard') }}">پنل کاربری</a>
    @endauth
</div>
