@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
                <span>{{ $post->author->name }}</span>
            </div>
            <div class="col-4">
                @include('partials.categories.sidebar')
            </div>
        </div>
    </div>
@endsection
