@extends('layouts.app')
@section('title', 'Admin system for Restore by Easiwebs Solutions')
@section('content')
<head>
    <!--@yield('title') -->
</head>
<div class="container">
    <!--<div class="row justify-content-center">
        <!--<div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>-->
    <h2>&nbsp&nbsp&nbsp&nbspHOME</h2>
    <nav>
        <ul>
            <li><a href="/tables">Tables</a></li>
            <li><a href="/reports">Reports</a></li>
            <li><a href="/home">About</a></li>
            <li><a href="/home">Help</a></li>
        </ul>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    </div>

    <!-- TODO: Show status under the menu? or somewhere on the screen!
    (apart from the far right hand side!)
        <div class="status">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
            <!--</div>
        </div>
    <!--</div> -->
</div>
@endsection

<style>
    nav{
        float: left;
        width: 100%;
        margin:0;
        padding:0;
    }

    nav ul{
        font-family: 'ProximaNovaSemibold', sans-serif;
        margin-top: 30px;
        list-style-type: none;
    }

    nav li{
        display: inline;

    }

    nav li a{
        color: #000;
        font-size: 12px;
        text-transform: uppercase;
        text-decoration: none;
        padding: 0 10px 15px 10px;
        border-bottom: 4px solid #42ada2;
    }

    nav li.current a{
        border-bottom: 4px solid #f7941d;
}</style>
