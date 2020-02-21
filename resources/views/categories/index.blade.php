@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-12">
            @foreach($categories as $category)
                <div>
                    <a href={{ route('categories.show', $category->id) }}><h3>{{ $category->title }}</h3></a>
                </div>
                <hr>
            @endforeach
            {{ $categories->links() }}
        </div>
    </div>
@endsection
