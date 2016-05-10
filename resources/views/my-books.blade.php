@extends('master')

@section('title')
  My books
@stop

@section('content')

  <h1>My books</h1>

  <div class="book">
    @foreach($books as $book)
      <h2 class='bookh'>{{ $book->title }}</h2>
      <a class='booka' href="/books/edit/{{$book->id}}">Edit</a>
      @if ($book->borrowed==TRUE)<a class='booka' id='bookab' href="/books/confirm-return/{{$book->id}}">Return</a>@endif
      <div class='tags'>
          @foreach($book->tags as $tag)
              <div class='tag'>{{ $tag->name }}</div>
          @endforeach
      </div>
      <br><br>
    @endforeach
  </div>

@stop
