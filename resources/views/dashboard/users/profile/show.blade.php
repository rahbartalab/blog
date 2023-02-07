@extends('layouts.users.profile')
@section('content')

    <div class="pr-12 mt-24">
        <p>نام : {{ $user->first_name }}</p>
        <p>نام خانوادگی : {{ $user->last_name }}</p>
        <p class="mb-12">ایمیل : {{ $user->email }}</p>

        <a href="{{ route('profile.edit' , Auth::user()) }}" class="bg-green-500 px-4 mb-12 py-2 text-white rounded">ویرایش
            پروفایل</a>

        <a href="{{ route('roles.show' , Auth::user()) }}" class="mt-12 block">نقش :
            <span class="text-purple-500">{{ $user->role->name }}</span>
        </a>

        <p class="mt-16">دسترسی ها : </p>
        <ul>
            @foreach($user->getPermissionsViaRoles()->pluck('fa-name') as $permission)
                <li class="text-green-700">{{ $permission }}</li>
            @endforeach
        </ul>
    </div>
@endsection
