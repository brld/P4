@extends('master')

@section('title')
    Welcome to Scout Manager
@stop

@section('content')
    @if(Auth::check())
    <h1 class='header-no-border-bottom'>Welcome to Scout Manager!</h1>
    <p class='centerp'>
      Click <a href="/books">here</a> to view all of the Books.<br><br>
      Click <a href="/equipment">here</a> to view all of the Equipment.<br><br>
      Click <a href="/books/add">here</a> to add a new Book.<br><br>
      Click <a href="/equipment/add">here</a> to add new Equipment.<br><br>
    </p>
    @else
    <p id='indexh'>
        Welcome to Scout Manager, your online database for all books and equipment owned by the troop.<br>
    </p>
    <p id='index'>
        To get started <a href='/login'>Log In</a> or <a href='/register'>Register</a>.
    </p>
    @endif
@stop
