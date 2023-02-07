@extends('layouts.auth')
@section('content')
    <div class="text-center p-12 flex flex-col justify-center gap-12">
        <p>WELCOME {{ $user->first_name }}</p>


        <div class="flex gap-4 flex-col text-right">
            @can('roles.index')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('roles.index') }}">لیست نقش ها</a>
            @endcan

            @can('roles.create')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('roles.create') }}">افزودن نقش</a>
            @endcan

            @can('users.index')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('users.index') }}">نمایش کاربران</a>
            @endcan

            @can('users.create')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('users.create') }}">افزودن کاربر</a>
            @endcan
        </div>


    </div>
@endsection
