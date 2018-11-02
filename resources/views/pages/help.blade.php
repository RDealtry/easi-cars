@extends('layouts.app')
@section('title', 'Easi-CARS by Easiwebs Solutions')
@section('content')
<br/>
<h1>&nbsp&nbsp&nbsp&nbsp"Help" page to be created</h1>
<nav>
    <ul>
        <li><a href="/home">Home</a></li>
    </ul>
</nav>
@stop
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
