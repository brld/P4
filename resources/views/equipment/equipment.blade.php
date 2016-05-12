@extends('master')

@section('title')
  All Equipment
@stop

@section('content')

  <h1>All Equipment</h1>

  <div class="equipment">
    @foreach($equipment as $indiEquipment)
      <h2 class='item'>{{ $indiEquipment->item }}</h2>
      <a class='itema'href="/equipment/edit/{{$indiEquipment->id}}"><i class='fa fa-pencil'></i> Edit</a>
      @if ($indiEquipment->borrowed==FALSE)<a class='booka' id='itemab' href="/equipment/borrow/{{$indiEquipment->id}}">Borrow</a>@endif
      @if ($indiEquipment->borrowed==TRUE)<a class='booka' id='itemab' href="/equipment/confirm-return/{{$indiEquipment->id}}">Return</a>@endif
      <a class='itema' id='itemad' href='/equipment/confirm-delete/{{$indiEquipment->id}}'>Delete</a>
      <h3 class='truncate'>Owner: {{ $indiEquipment->owner->first_name }} {{ $indiEquipment->owner->last_name }}</h3>
      @if ($indiEquipment->borrowed==true) <h3 class='truncate' id='borrowed'>Borrowed for {{$indiEquipment->borrowed_for}}</h3>@endif
      <div class='tags'>
          @foreach($indiEquipment->tags as $tag)
              <div class='tag'>{{ $tag->name }}</div>
          @endforeach
      </div>
      <br><br>
    @endforeach
  </div>

@stop
