@extends('layouts.app')
@section('components')
    @include('Components.navbar.guest')

    @yield('content')
@endsection
