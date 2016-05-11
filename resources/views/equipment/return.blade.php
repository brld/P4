@extends('master')

@section('title')
    Return Item
@stop

@section('content')
    <h1>Return Item</h1>
    <p>Are you sure you want to return <em>{{$equipment->item}}</em>?</p>
    <p><a href='/equipment/return/{{$equipment->id}}'>Yes...</a></p>
@stop
