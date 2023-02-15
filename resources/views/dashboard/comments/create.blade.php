@extends('layouts.dashboard')
@section('content')
    <div class="text-center p-12 gap-12">
        <p class="mb-12">ساخت کامنت</p>
        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <div class="flex justify-center items-start gap-12">
                <div class="mt-12 flex flex-col gap-3">
                    <label for="body" class="block">متن</label>
                    <input id="body" name="body" type="text"
                           value="{{ old('body') }}"
                           class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
                    @error('body')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-5">
                <label for="post_id" class="block">پست را انتخاب کنید</label>
                <select name="post_id" id="post_id" class="mt-5 bg-gray-300 rounded">
                    @foreach($posts as $post)
                        <option class="px-2 py-1 bg-gray-300" value="{{ $post->id }}">{{ $post->title }}</option>
                    @endforeach
                </select>
            </div>


            <input type="submit" value="افزودن"
                   class="bg-slate-700 mt-12 text-white rounded px-4 py-2 cursor-pointer">
        </form>

    </div>
@endsection
