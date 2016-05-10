@extends('master')

@section('title')
    Welcome to Scout Manager
@stop

@section('content')
    @if(Auth::check())
    <h1>Welcome to Scout Manager!</h1>
    @else
    <p>
        Welcome to Scout Manager, an online database for all books and items owned by a troop.
        To get started <a href='/login'>log in</a> or <a href='/register'>register</a>.
    </p>
    @endif
@stop
