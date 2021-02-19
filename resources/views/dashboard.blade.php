@extends('layouts.app')

@section('content')
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Recipe Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
        </div>
        <div class="col-md-6 col-md-offset-2">
            <a href="/recipes/create" class="btn btn-primary">Create Recipe</a>
            <h3>Your Recipe Posts</h3>
            @if(count($recipes) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td>{{$recipe->name}}</td>
                            <td><a href="/recipes/{{$recipe->id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>
                                {!!Form::open(['action' => ['App\Http\Controllers\RecipesController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no recipes</p>
            @endif
        </div>
    </div>
</div>
@endsection
