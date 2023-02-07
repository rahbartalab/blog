@extends('layouts.guest')
@section('content')
    @if(session()->exists('message'))
        <p class="text-center mt-12 text-green-800">ایمیل بازیابی رمز عبور با موفقیت برای شما ارسال شد.</p>
    @endif;

    <form action="{{ route('forgot-password.store') }}" method="post">
        @csrf
        <div class="text-center flex flex-col gap-12 mt-24 bg-gray-300 w-1/3 rounded-2xl mx-auto py-6">

            <div class="w-96 mx-auto text-center">
                <label for="email" class="block mb-6">لطفا ایمیل خود را وارد کنید</label>
                <input id="email" name="email" type="email"
                       class="text-center px-4 py-2 rounded bg-gray-100 text-slate-700 outline-1 outline-slate-500"
                       placeholder="example@gmail.com">
            </div>
            @error('email')
            <p class="text-sm text-red-500 text-center">{{ $message }}</p>
            @enderror

            <div class="w-96 mx-auto">
                <input type="submit" value="بازیابی"
                       class="mx-auto bg-purple-700 hover:bg-purple-500 transition text-white px-4 py-2 rounded cursor-pointer">
            </div>
        </div>
    </form>
@endsection
