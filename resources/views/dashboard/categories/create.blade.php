@extends('layouts.dashboard')
@section('content')
    <div class="text-center p-12 gap-12">
        <p class="mb-12">ساخت دسته بندی جدید</p>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="flex justify-center items-start gap-12">
                <div class="mt-12 flex flex-col gap-3">
                    <label for="name" class="block">نام دسته بندی</label>
                    <input id="name" name="name" type="text"
                           class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
                    @error('name')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-12 flex flex-col gap-3">
                    <label for="slug" class="block">slug</label>
                    <input id="slug" name="slug" type="text"
                           class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
                    @error('slug')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col justify-start mt-12 gap-3">
                    <label for="parent_id">دسته بندی</label>
                    <select name="parent_id" id="parent_id" class="px-6 bg-gray-300 rounded">
                        <option value="{{ null }}">بدون دسته بندی</option>
                        @foreach($categories as $category)
                            <option
                                {{ $category['id'] == old('parent_id') ? 'selected' : '' }}
                                value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" value="افزودن"
                   class="bg-slate-700 mt-12 text-white rounded px-4 py-2 cursor-pointer">
        </form>

    </div>
@endsection
