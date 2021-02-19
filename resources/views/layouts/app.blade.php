<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <script src="{{asset('js/app.js')}}"></script>
        
        <title>{{config('app.name','Soap Dish')}}</title>
    </head>

    <body>
        
        
        @include('inc.navbar')


        <div class = "container">


            @include('inc.messages')


            @yield('content')
            
        </div>
    </body>
</html>