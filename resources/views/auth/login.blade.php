@extends('layouts.guest')
<div class="w-3/4 mx-auto p-5 text-center">

    <form action="{{ route('login.store') }}" method="post">
        @csrf
        @method('POST')

        <h1 class="text-lg font-bold mb-12">Login</h1>


        <p>Email</p>
        <input type="text" value="{{ old('email') }}" class="w-100 p-3 bg-gray-300" name="email" )>
        @error('email')
        <div class="alert alert-danger text-red-600">{{ $message }}</div>
        @enderror

        <p>Password</p>
        <input type="text" value="{{ old('password') }}" class="w-100 p-3 bg-gray-300" name="password">
        @error('password')
        <div class="alert alert-danger text-red-600">{{ $message }}</div>
        @enderror


        <p></p>
        <input type="submit" class="w-100 p-3 bg-gray-300 mt-6 bg-slate-700 text-white">

    </form>


</div>
