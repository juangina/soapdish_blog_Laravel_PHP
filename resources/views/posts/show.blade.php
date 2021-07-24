@extends('layouts.app')

@section('content')
    <!--
    <a href="/posts" class='btn btn-secondary'>Go Back to Recipe Blog</a>
    -->
    <a href="<?php echo url()->previous()?>" class='btn btn-secondary'>Go Back</a>
    <h1>{{$post->title}}</h1>
    <img src="{{$post->cover_image}}" style="width: 100%" alt="Different Soaps">
    <hr>
    <div>{!!$post->body!!}</div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
@endsection