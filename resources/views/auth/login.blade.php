@extends('layouts.guest')
@section('content')
    <div class="w-3/4 mx-auto p-5 text-center">

        <form action="{{ route('login.store') }}" method="post">
            @csrf
            @method('POST')

            <h1 class="text-lg font-bold mb-12 py-2">ورود</h1>
            <hr class="mb-6">

            <p class="my-2">ایمیل</p>
            <input type="text" value="{{ old('email') }}" class="w-100 p-3 bg-gray-300" name="email" )>
            @error('email')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p class="my-2">رمز عبور</p>
            <input type="password" value="{{ old('password') }}" class="w-100 p-3 bg-gray-300" name="password">
            @error('password')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p class="text-sm text-orange-700 underline mt-12 mb-6">رمز عبور خود را فراموش کرده اید ؟</p>
            <a class="text-sm bg-purple-400 text-white rounded px-3 py-1 w-36 hover:bg-purple-300 transition"
               href="{{ route('forgot-password.index') }}">بازیابی
                رمز عبور
            </a>


            <p></p>
            <input type="submit"
                   class="w-100 cursor-pointer transition hover:bg-slate-600 p-3 mt-6 bg-slate-700 rounded w-24 text-white"
                   value="ورود">

        </form>


    </div>
@endsection
