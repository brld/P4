@extends('master')

@section('title')
    Welcome to Scout Manager
@stop

@section('content')
    @if(Auth::check())
    <h1 class='header-no-border-bottom'>Welcome to Scout Manager!</h1>
    @else
    <p id='indexh'>
        Welcome to Scout Manager, your online database for all books and equipment owned by the troop.<br>
    </p>
    <p id='index'>
        To get started <a href='/login'>Log In</a> or <a href='/register'>Register</a>.
    </p>
    @endif
@stop
