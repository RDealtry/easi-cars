@extends('layouts.app')
@section('title', 'Restore by Easiwebs Solutions')
@section('content')
<h2>&nbsp&nbsp&nbsp&nbspREPORTS</h2>

<nav>
    <ul>
        <li><a href="/home">Home</a></li>
        <li><a href="http://localhost/home/index.php/features">Houses Summary</a></li>
        <li><a href="http://localhost/home/index.php/services">Certificates Summary</a></li>
        <li><a href="http://localhost/home/index.php/portfolio">Tenants Summary</a></li>
        <li><a href="http://localhost/home/index.php/contact">Rooms Summary</a></li>
        <li class="current"><a href="http://localhost/home/index.php/contact">Casenotes Summary</a></li>
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
        margin-top: 10px;
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
