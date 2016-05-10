@if(sizeof($equipment) == 0)
    No results found.
@endif

@foreach($equipment as $indiEquipment)
    <div class='book'>
        <a href='/equipment/edit/{{$indiEquipment->id}}'>{{ $indiEquipment->item }}</a>
    </div>
@endforeach
