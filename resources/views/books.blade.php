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
      <a class='booka' id='bookab' href="/books/borrow/{{$book->id}}">Borrow</a>
      <a class='booka' id='bookad' href='/books/confirm-delete/{{$book->id}}'>Delete</a>
      <h3 class='truncate'>Owner: {{ $book->owner->first_name }} {{ $book->owner->last_name }}</h3>
      @if ($book->borrowed==true) <h3 class='truncate' id='borrowed'>Borrowed by {{ $user->first_name }} {{$user->last_name}} </h3>@endif
      <div class='tags'>
          @foreach($book->tags as $tag)
              <div class='tag'>{{ $tag->name }}</div>
          @endforeach
      </div>
      <br><br>
    @endforeach
  </div>

@stop
