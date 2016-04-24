@extends('master')

@section('title')
  All books
@stop

@section('content')

  <h1>All the equipment</h1>

  <div class="equipment">
    @foreach($equipment as $indiEquipment)
      <h2>{{ $indiEquipment->item }}</h2>
      <a href="/equipment/edit/{{$indiEquipment->id}}">Edit</a>
    @endforeach
  </div>

@stop
