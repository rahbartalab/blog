@extends('layouts.app')
@section('components')
    @include('Components.navbar.auth')

    @yield('content')
@endsection
