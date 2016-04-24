@extends('master')

@section('title')
  All books
@stop

@section('content')

  <h1>All the books</h1>

  <div class="book">
    @foreach($books as $book)
      <h2 class='bookh'>{{ $book->title }}</h2>
      <a class='booka'href="/books/edit/{{$book->id}}">Edit</a>
      <br><br>
    @endforeach
  </div>

@stop
