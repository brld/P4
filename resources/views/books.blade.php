@extends('master')

@section('title')
  All books
@stop

@section('content')

  <h1>All the books</h1>

  <div class="book">
    @foreach($books as $book)
      <h2>{{ $book->title }}</h2>
      <a href="/books/edit/{{$book->id}}">Edit</a>
    @endforeach
  </div>

@stop
