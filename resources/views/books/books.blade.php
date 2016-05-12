@extends('master')

@section('title')
  All Books
@stop

@section('content')

  <h1>All Books</h1>

  <div class="book">
    @foreach($books as $book)
      <h2 class='bookh'>{{ $book->title }}</h2>
      <a class='booka' href="/books/edit/{{$book->id}}"><i class='fa fa-pencil'></i> Edit</a>
      @if ($book->borrowed==FALSE)<a class='bookab' href="/books/borrow/{{$book->id}}"><i class='fa fa-clock-o'></i> Borrow</a>@endif
      @if ($book->borrowed==TRUE)<a class='bookab' href="/books/confirm-return/{{$book->id}}"><i class='fa fa-check'></i> Return</a>@endif
      <a class='bookadbooks' href='/books/confirm-delete/{{$book->id}}'><i class='fa fa-times'></i> Delete</a>
      <h3 class='truncate'>Owner: {{ $book->owner->first_name }} {{ $book->owner->last_name }}</h3>
      @if ($book->borrowed==true) <h3 class='borrowed'>Borrowed for {{$book->borrowed_for}}</h3>@endif
      <div class='tags'>
          @foreach($book->tags as $tag)
              <div class='tag'>{{ $tag->name }}</div>
          @endforeach
      </div>
      <br><br>
    @endforeach
  </div>

@stop
