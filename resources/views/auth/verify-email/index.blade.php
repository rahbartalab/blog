@extends('layouts.dashboard')
@section('content')
    @if(session()->exists('message'))
        <p class="my-3 text-center mt-3 text-purple-700 text-sm">{{ session()->get('message') }}</p>
    @endif
    <p class="mt-12 bg-red-500 px-4 py-2 rounded text-white w-1/4 text-center mx-auto">لطفا ایمیل خود را تایید کنید</p>
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <input
            style="font-family: snappFont,serif"
            type="submit"
            class="px-4 block mx-auto mt-4 cursor-pointer text-center py-2 bg-slate-700 rounded text-white"
            value="ایمیل فعال سازی را دریافت نکردم">
    </form>

@endsection
