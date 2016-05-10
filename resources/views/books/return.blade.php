@extends('master')

@section('title')
    Return Book
@stop

@section('content')
    <h1>Return Book</h1>
    <p>Are you sure you want to return <em>{{$book->title}}</em>?</p>
    <p><a href='/books/return/{{$book->id}}'>Yes...</a></p>
@stop
