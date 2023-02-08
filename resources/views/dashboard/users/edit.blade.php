@extends('layouts.dashboard')
@section('content')
    <div class="w-3/4 mx-auto p-5 text-center">

        <form action="{{ route('users.update' , $user->id) }}" method="post">
            @csrf
            @method('PATCH')

            <h1 class="text-lg font-bold mb-12">ویرایش اطلاعات کاربر</h1>

            <p>نام</p>
            <input type="text" value="{{ $user->first_name }}" class="w-100 p-3 bg-gray-300" name="first_name" )>
            @error('first_name')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p>نام خانوادگی</p>
            <input type="text" value="{{ $user->last_name }}" class="w-100 p-3 bg-gray-300" name="last_name">
            @error('last_name')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p>ایمیل</p>
            <input type="email" value="{{ $user->email }}" class="w-100 p-3 bg-gray-300" name="email">
            @error('email')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p>رمز عبور</p>
            <input type="password" class="w-100 p-3 bg-gray-300" name="password">
            @error('password')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror

            <p>تایید رمز عبور</p>
            <input type="password" value="{{ old('password_confirmation') }}" class="w-100 p-3 bg-gray-300"
                   name="password_confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror


            <div class="w-1/2 mx-auto mt-5">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نقش کاربر را
                    انتخاب کنید</label>
                <select id="role"
                        name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="{{ null }}">بدون نقش</option>
                    @foreach($roles as $role)
                        <option
                            @if(isset($user->roles[0]))
                            {{ $user->roles[0]->id == $role['id'] ? 'selected' : '' }}
                            @endif
                            value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                    @endforeach
                </select>
            </div>
            @error('role')
            <div class="alert alert-danger text-red-600">{{ $message }}</div>
            @enderror


            <p></p>
            <input type="submit" class="w-100 p-3 bg-gray-300 mt-6 bg-slate-700 text-white" value="ویرایش">

        </form>
    </div>
@endsection
