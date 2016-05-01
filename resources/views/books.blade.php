@extends('master')

@section('title')
  All books
@stop

@section('content')

  <h1>All the books</h1>

  <div class="book">
    @foreach($books as $book)
      <h2 class='bookh'>{{ $book->title }}</h2>
      <a class='booka' href="/books/edit/{{$book->id}}">Edit</a>
      <h3 class='truncate'>Owner: {{ $book->owner->first_name }} {{ $book->owner->last_name }}</h3>
      <br><br>
    @endforeach
  </div>

@stop
