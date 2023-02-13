@extends('layouts.auth')
@section('content')
    <div class="text-center p-12 flex flex-col justify-center gap-6">
        <p class="italic text-orange-700"> Simplicity is the essence of happiness </p>

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

            @can('categories.index')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('categories.index') }}">نمایش دسته بندی</a>
            @endcan

            @can('categories.create')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('categories.create') }}">افزودن دسته بندی</a>
            @endcan

            @can('tags.index')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('tags.index') }}">نمایش تگ ها</a>
            @endcan

            @can('tags.create')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('tags.create') }}">افزودن تگ جدید</a>
            @endcan

            @can('posts.index')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('posts.index') }}">نمایش پست ها</a>
            @endcan

            @can('posts.create')
                <a class="rounded px-12 py-4 text-blue-500" href="{{ route('posts.create') }}">افزودن پست جدید</a>
            @endcan
        </div>


    </div>
@endsection
