@extends('layouts.app')
@section('components')
    @include('Components.navbar.profile')

    @yield('content')
@endsection
