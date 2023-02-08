@extends('layouts.guest')

@section('content')
    <div class="w-3/4 mx-auto p-5 text-center">

        <form action="{{ route('register.store') }}" method="post">
            @csrf
            @method('POST')

            <h1 class="text-lg font-bold mb-12">ثبت نام</h1>


            <p class="my-3">نام</p>
            <input type="text" value="{{ old('first_name') }}" class="w-100 p-3 bg-gray-300" name="first_name" )>
            @error('first_name')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p class="my-3">نام خانوادگی</p>
            <input type="text" value="{{ old('last_name') }}" class="w-100 p-3 bg-gray-300" name="last_name">
            @error('last_name')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p class="my-3">ایمیل</p>
            <input type="email" value="{{ old('email') }}" class="w-100 p-3 bg-gray-300" name="email">
            @error('email')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p class="my-3">رمز عبور</p>
            <input type="password" value="{{ old('password') }}" class="w-100 p-3 bg-gray-300" name="password">
            @error('password')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p class="my-3">تایید رمز عبور</p>
            <input type="password" value="{{ old('password_confirmation') }}" class="w-100 p-3 bg-gray-300"
                   name="password_confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p></p>
            <input type="submit" value="ثبت نام"
                   class="w-100 bg-slate-700 hover:bg-slate-500 transition rounded p-3 mt-6 bg-slate-700 text-white">

        </form>


    </div>
@endsection
