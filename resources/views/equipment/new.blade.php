@extends('master')

@section('title')
  Newest equipment
@stop

@section('content')

  <h1>Newest equipment</h1>

  <div class="book">
    @foreach($equipment as $indiEquipment)
      <h2 class='bookh'>{{ $indiEquipment->item }}</h2>
      <a class='booka' href="/equipment/edit/{{$indiEquipment->id}}">Edit</a>
      @if ($indiEquipment->borrowed==FALSE)<a class='booka' id='bookab' href="/equipment/borrow/{{$indiEquipment->id}}">Borrow</a>@endif
      @if ($indiEquipment->borrowed==TRUE)<a class='booka' id='bookab' href="/equipment/confirm-return/{{$indiEquipment->id}}">Return</a>@endif
      <a class='booka' id='bookad' href='/equipment/confirm-delete/{{$indiEquipment->id}}'>Delete</a>
      <h3 class='truncate'>Owner: {{ $indiEquipment->owner->first_name }} {{ $indiEquipment->owner->last_name }}</h3>
      @if ($indiEquipment->borrowed==true) <h3 class='truncate' id='borrowed'>Borrowed</h3>@endif
      <div class='tags'>
          @foreach($indiEquipment->tags as $tag)
              <div class='tag'>{{ $tag->name }}</div>
          @endforeach
      </div>
      <br><br>
    @endforeach
  </div>

@stop
