@extends('layouts.app')

@section('content')
    <div class = "jumbotron text-center">
        <figure>
            <img class="img-fluid" src="{{asset('images/pexels-taryn-elliott-4426556.jpg')}}" alt="Chania">
            <figcaption>Photo by Taryn Elliot<a href="https://www.pexels.com/photo/white-book-page-on-brown-wooden-table-4426556/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels"></a></figcaption>
        </figure>
        <h1>{{$title}}</h1>
        <p>This Website will be used as a resource for making and analyzing Soap Recipes!</p>
        <p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="Register">Register</a>
        </p>
    </div>
@endsection
