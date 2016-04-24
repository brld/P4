@extends('master')

@section('title')
    Add new equipment
@stop

@section('content')

    <h1>Add new equipment</h1>

    <form method='POST' action='/equipment/add'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Title:</label>
            <input
                type='text'
                id='title'
                name='item'
                value='{{ old('item','Wilderness Trip Photos') }}'
            >
           <div class='error'>{{ $errors->first('item') }}</div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn-primary">Add item</button>

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
