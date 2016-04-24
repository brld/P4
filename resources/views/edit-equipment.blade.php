@extends('master')

@section('title')
    Edit an item {{ $equipment->item }}
@stop

@section('content')

    <h1>Edit an item {{ $equipment->item }}</h1>

    <form method='POST' action='/equipment/edit'>

        <input type="hidden" name="id" value="{{$equipment->id}}">

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Title:</label>
            <input
                type='text'
                id='title'
                name='item'
                value='{{ $equipment->item }}'
            >
           <div class='error'>{{ $errors->first('title') }}</div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn-primary">Save changes</button>

        {{--
        <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        --}}

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>


@stop
