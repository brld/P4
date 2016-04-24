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
      <br><br>
    @endforeach
  </div>

@stop
