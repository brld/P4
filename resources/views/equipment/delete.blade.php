@extends('master')

@section('title')
    Delete Item
@stop

@section('content')
    <h1>Delete Item</h1>
    <p>Are you sure you want to delete <em>{{$equipment->item}}</em>?</p>
    <p><a href='/equipment/delete/{{$equipment->id}}'>Yes...</a></p>
@stop
