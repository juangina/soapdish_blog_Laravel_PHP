<?php

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


////////////////////////////////////////////////////////////////////////////////////////////


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('posts', $user->posts);
    }
}

////////////////////////////////////////////////////////////////////////////////////////////

    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>


////////////////////////////////////////////////////////////////////////////////////////////


<ul class="nav navbar-nav ml-auto">
<li class="nav-item">
    <a class="nav-link" href="/recipes">Recipes</a>
</li> 
<li class="nav-item">
    <a class="nav-link" href="/posts">Blog</a>
</li>
</ul>


////////////////////////////////////////////////////////////////////////////////////////////


    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        
        <title>{{config('app.name','Soap Dish')}}</title>
    </head>

    <body>
        
        @include('inc.navbar')


        <div class = "container">


            @include('inc.messages')


            @yield('content')


        </div>

    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

    </body>
</html>


////////////////////////////////////////////////////////////////////////////////////////////


{!! Form::number('fuel',null,['class' => 'form-control','step'=>'any']) !!}


////////////////////////////////////////////////////////////////////////////////////////////


    <!-- Authentication Links -->
    @if (Auth::guest())
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
    @else
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/recipes">Recipes</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="/posts">Blog</a>
            </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
    @endif
</ul>

////////////////////////////////////////////////////////////////////////////////////////////

<div class="form-group">
{{Form::label('number_of_bars', 'Select Number of Bars')}}
{{Form::selectRange('number_of_bars', 1, 12, ['id' => 'bars_form'])}}
</div>

<div class="form-group">
{{Form::label('name', 'Name')}}
{{Form::text('name', '', ['id' => 'name_form', 'class' => 'form-control', 'placeholder' => 'Name'])}}
</div>
<div class="form-group">
{{Form::label('description', 'Description')}}
{{Form::textarea('description', '', ['id' => 'description_form', 'class' => 'form-control', 'placeholder' => 'Description Text'])}}
</div>

$("#name_form").val("Experimental Bar");
        
$("#description_form").val("Press the Update form to re-calulate your amounts based on the number of bars and the percentages.");

////////////////////////////////////////////////////////////////////////////////////////////

<input id="update_form" type="button" value="Update Form"/>

////////////////////////////////////////////////////////////////////////////////////////////

<div class="container-fluid">    
<div class="row">
    <div class="col">
        <table class="table table-bordered table-striped">



        </table>
    </div>
</div>
</div>


<tr>
<th>Ingredient</th>
<th>Percentage</th>
<th>Amount (grams)</th>
</tr>
<tr>
<td>Coconut Oil</td>
<td>{{Form::text('coconut_oil_percentage', '35', ['id'=>'coconut_oil_percentage', 'class'=>'oil_percentage'])}}</td>
<td>{{Form::text('coconut_oil_weight', '', ['id'=>'coconut_oil_weight', 'class'=>'oil_weight'])}}</td>>
</tr>
<tr>
<td>Palm Oil</td>
<td>{{Form::text('palm_oil_percentage', '30', ['id'=>'palm_oil_percentage', 'class'=>'oil_percentage'])}}</td>
<td>{{Form::text('palm_oil_weight', '', ['id'=>'palm_oil_weight', 'class'=>'oil_weight'])}}</td>>
</tr>
<tr>
<td>Olive Oil</td>
<td>{{Form::text('olive_oil_percentage', '35', ['id'=>'olive_oil_percentage', 'class'=>'oil_percentage'])}}</td>
<td>{{Form::text('olive_oil_weight', '', ['id'=>'olive_oil_weight', 'class'=>'oil_weight'])}}</td>>
</tr>
<tr>
<td>Castor Oil</td>
<td>{{Form::text('castor_oil_percentage', '0', ['id'=>'castor_oil_percentage', 'class'=>'oil_percentage'])}}</td>
<td>{{Form::text('castor_oil_weight', '', ['id'=>'castor_oil_weight', 'class'=>'oil_weight'])}}</td>>
</tr>
<tr>
<td>Sum Total</td>
<td>{{Form::text('sum_total_percentage', '', ['id'=>'sum_total_percentage'])}}</td>
<td>{{Form::text('sum_total_weight', '', ['id'=>'sum_total_weight'])}}</td>>
</tr>

////////////////////////////////////////////////////////////////////////////////////////////

{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

////////////////////////////////////////////////////////////////////////////////////////////

<a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>

{!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!! Form::close() !!}

////////////////////////////////////////////////////////////////////////////////////////////

{!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
</div>
<div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text', 'id'=>'article-ckeditor'])}}
</div>
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
<a href="/posts/{{$post->id}}" class="btn btn-secondary">Cancel</a>
{!! Form::close() !!}

////////////////////////////////////////////////////////////////////////////////////////////

{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
<a href="/recipes/{{$recipe->id}}" class="btn btn-secondary">Cancel</a>
{!! Form::close() !!}

////////////////////////////////////////////////////////////////////////////////////////////

<a href="/recipes/{{$recipe->id}}/edit" class="btn btn-secondary m-3">Edit</a>

{!! Form::open(['action' => ['App\Http\Controllers\RecipesController@destroy', $recipe->id], 'method' => 'POST', 'class'=>'float-right m-3'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!! Form::close() !!}

////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////

