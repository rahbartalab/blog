@extends('layouts.dashboard')
@section('content')
    <div class="text-center p-12 gap-12">
        <p class="mb-12">ساخت تگ جدید</p>
        <form action="{{ route('tags.store') }}" method="post">
            @csrf
            <div class="flex justify-center items-start gap-12">
                <div class="mt-12 flex flex-col gap-3">
                    <label for="name" class="block">نام تگ</label>
                    <input id="name" name="name" type="text"
                           value="{{ old('name') }}"
                           class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
                    @error('name')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <input type="submit" value="افزودن"
                   class="bg-slate-700 mt-12 text-white rounded px-4 py-2 cursor-pointer">
        </form>

    </div>
@endsection
