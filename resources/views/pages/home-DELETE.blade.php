@extends('layouts.app')

<body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Request::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="navbar-fixed-top">
                <a href="https://laravel.com/docs">Documentation</a>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    Easi-CARS
                    <h6>Casenotes, Administration, Reporting System</h6>
                </div>

            </div>
        </div>
    </body>
@section('content')
    I am the home page
<br/>
<br/>
<br/>
@stop
