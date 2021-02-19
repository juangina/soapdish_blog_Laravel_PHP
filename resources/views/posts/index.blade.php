@extends('layouts.app')

@section('content')
    <h1>Recipes Blog</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class = "card p-3 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" class="img-thumbnail" alt="Different Soaps">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3 class = "card-body"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small class = "card-body">Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>

            </div>
        @endforeach
        {{$posts->links('pagination::bootstrap-4')}}
    @else
        <p>No posts found</p>
    @endif
@endsection