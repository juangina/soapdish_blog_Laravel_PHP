@extends('layouts.app')

@section('content')
        <h1>{{$title}}</h1>
        <p>Below is a Short List of the services I aim to provide!</p>
        <ul>
            <li>Internet of Things(IoT) Home Automation (using Raspberry Pi)</li>
            <li>Database Support Services for Business and Engineering Education (using Postgresql)</li>
            <li>I am also good at: </li>
            <ul class="list-group">
                @if(count($services) >0)
                    @foreach($services as $service)
                        <li class="list-group-item">{{$service}}</li>
                    @endforeach
                @endif
            </ul>
            
        </ul>
@endsection