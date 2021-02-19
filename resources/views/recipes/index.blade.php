@extends('layouts.app')

@section('content')
    <h1>Recipes</h1>
    @if(count($recipes) > 0)
        @foreach($recipes as $recipe)
            <div class = "card p-3 mt-3 mb-3">
                <h3 class = "card-body"><a href="/recipes/{{$recipe->id}}">{{$recipe->name}}</a></h3>
            </div>
        @endforeach
        {{$recipes->links('pagination::bootstrap-4')}}
    @else
        <p>No recipes found</p>
    @endif
@endsection