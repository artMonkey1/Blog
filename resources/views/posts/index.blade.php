@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="text-left">
                    <h1>All Posts</h1>
                </div>
                <div class="text-right">
                    <form action="" method="get">
                        <p><select name="order_by" >
                                <option disabled>Order by:</option>
                                <option value="title">Title</option>
                                <option value="exert">Exert</option>
                                <option value="views">Views</option>
                            </select></p>
                        <p><select name="dir" >
                                <option disabled>Dir:</option>
                                <option value="asc">Asc</option>
                                <option value="desc">Desc</option>
                            </select></p>
                        <p><input type="submit" value="Order"></p>
                    </form>
                </div>
            @foreach($posts as $post)
                <div>
                    <a href="{{ route('posts.show', $post->id) }}"><h3>{{ $post->title }}</h3></a>
                    <p>{{ $post->exert }}</p>
                    <span>Author: {{ $post->author->name }}</span><br>
                    <span>Views: {{ $post->views }}</span>
                </div>
                <hr>
            @endforeach
            {{ $posts->links() }}
            </div>
            <div class="col-4">
                @include('partials.categories.sidebar')
            </div>
        </div>
    </div>
@endsection
