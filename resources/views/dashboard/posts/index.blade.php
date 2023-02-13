@extends('layouts.dashboard')
@section('content')
    <div class="text-center p-12 gap-12">
        @foreach($posts as $post)
            <div class="my-3">
                <p>{{ $post->title }}</p>
            </div>
        @endforeach
    </div>
@endsection
