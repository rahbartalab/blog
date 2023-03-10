@extends('layouts.users.profile')
@section('content')

    <form action="{{ route('profile.update' , Auth::user()) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')


        <div class="pr-12 mt-24 flex flex-col gap-3">
            <div class="flex gap-5 flex-col w-36">
                <p class="text-lg font-medium">عکس پروفایل</p>
                <div class="max-w-sm">
                    <input type="file" name="image"
                           class="bg-gray-400 py-2 px-4 rounded-lg shadow-sm hover:shadow focus:shadow-outline" alt="برای انتخاب کلیک کنید">
                </div>
            </div>
            @error('image')
            <p class="text-red-500 font-sm my-2">{{ $message }}</p>
            @enderror


            <div>
                <label for="first_name" class="block">نام : </label>
                <input name="first_name" id="first_name" class="px-4 w-72 py-2 bg-gray-300 rounded-xl" type="text"
                       value="{{ $user->first_name }}">
                @error('first_name')
                <p class="text-red-500 font-sm my-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="block">نام خانوادگی : </label>
                <input name="last_name" id="last_name" class="px-4 w-72 py-2 bg-gray-300 rounded-xl" type="text"
                       value="{{ $user->last_name }}">
                @error('last_name')
                <p class="text-red-500 font-sm my-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block">ایمیل : </label>
                <input name="email" id="email" class="px-4 py-2 w-72 bg-gray-300 rounded-xl" type="text"
                       value="{{ $user->email }}">
                @error('email')
                <p class="text-red-500 font-sm my-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block">رمز عبور : </label>
                <input name="password" id="password" class="px-4 py-2 w-72 bg-gray-300 rounded-xl" type="password">
                @error('password')
                <p class="text-red-500 font-sm my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 px-1">
                <div class="text-right mt-6">
                    <input type="submit" class="bg-purple-700 text-white rounded px-4 w-36 py-2 cursor-pointer"
                           value="ذخیره اطلاعات">
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('profile.destroy' , Auth::user()) }}">
        @csrf
        @method('DELETE')
        <div class="text-right mt-6 pr-12">
            <input type="submit" class="bg-red-700 text-white rounded px-4 w-36 py-2 cursor-pointer"
                   value="حذف اکانت">
        </div>
    </form>
@endsection
