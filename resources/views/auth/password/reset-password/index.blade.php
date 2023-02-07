@extends('layouts.guest')
@section('content')
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <p class="mx-auto text-center mt-12">بازیابی رمز عبور</p>
        <div class="text-center flex flex-col gap-12 mt-24 bg-gray-300 w-1/3 rounded-2xl mx-auto py-6">

            <div class="w-96 mx-auto text-center">
                <label for="email" class="block mb-6">ایمیل</label>
                <input id="email" name="email" type="email"
                       value="{{ old('email') }}"
                       class="text-center px-4 py-2 rounded bg-gray-100 text-slate-700 outline-1 outline-slate-500"
                       placeholder="example@gmail.com">
            </div>
            @error('email')
            <p class="text-sm text-red-500 text-center">{{ $message }}</p>
            @enderror

            <div class="w-96 mx-auto text-center">
                <label for="password" class="block mb-6">رمز عبور جدید</label>
                <input id="password" name="password" type="password"
                       class="text-center px-4 py-2 rounded bg-gray-100 text-slate-700 outline-1 outline-slate-500"
                >
            </div>

            <div class="w-96 mx-auto text-center">
                <label for="password" class="block mb-6"> تایید رمز عبور جدید</label>
                <input id="password" name="password_confirmation" type="password"
                       class="text-center px-4 py-2 rounded bg-gray-100 text-slate-700 outline-1 outline-slate-500"
                >
            </div>

            <div class="w-96 mx-auto">
                <input type="submit" value="بازیابی"
                       class="mx-auto bg-purple-700 hover:bg-purple-500 transition text-white px-4 py-2 rounded cursor-pointer">
            </div>
        </div>
    </form>
@endsection
