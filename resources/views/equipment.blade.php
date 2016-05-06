@extends('master')

@section('title')
  All equipment
@stop

@section('content')

  <h1>All the equipment</h1>

  <div class="equipment">
    @foreach($equipment as $indiEquipment)
      <h2 class='item'>{{ $indiEquipment->item }}</h2>
      <a class='itema'href="/equipment/edit/{{$indiEquipment->id}}">Edit</a>
      <a class='itema' id='itemad' href='/equipment/confirm-delete/{{$indiEquipment->id}}'>Delete</a>
      <h3 class='truncate'>Owner: {{ $indiEquipment->owner->first_name }} {{ $indiEquipment->owner->last_name }}</h3>
      <div class='tags'>
          @foreach($indiEquipment->tags as $tag)
              <div class='tag'>{{ $tag->name }}</div>
          @endforeach
      </div>
      <br><br>
    @endforeach
  </div>

@stop
