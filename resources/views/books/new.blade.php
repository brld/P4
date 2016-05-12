@extends('master')

@section('title')
  Newest books
@stop

@section('content')

  <h1>Newest books</h1>

  <div class="book">
    @foreach($books as $book)
      <h2 class='bookh'>{{ $book->title }}</h2>
      <a class='booka' href="/books/edit/{{$book->id}}">Edit</a>
      @if ($book->borrowed==FALSE)<a class='booka' id='bookab' href="/books/borrow/{{$book->id}}"><i class='fa fa-clock-o'></i> Borrow</a>@endif
      @if ($book->borrowed==TRUE)<a class='booka' id='bookab' href="/books/confirm-return/{{$book->id}}">Return</a>@endif
      <a class='booka' id='bookad' href='/books/confirm-delete/{{$book->id}}'><i class='fa fa-times'></i> Delete</a>
      <h3 class='truncate'>Owner: {{ $book->owner->first_name }} {{ $book->owner->last_name }}</h3>
      @if ($book->borrowed==true) <h3 class='truncate' id='borrowed'>Borrowed</h3>@endif
      <div class='tags'>
          @foreach($book->tags as $tag)
              <div class='tag'>{{ $tag->name }}</div>
          @endforeach
      </div>
      <br><br>
    @endforeach
  </div>

@stop
