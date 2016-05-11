@extends('master')

@section('title')
    Borrow an item {{ $equipment->item }}
@stop

@section('content')

    <h1>Borrow an item {{ $equipment->item }}</h1>

    <form method='POST' action='/equipment/borrow'>

        <input type="hidden" name="id" value="{{$equipment->id}}">

        {{ csrf_field() }}

        <div class='form-group'>
          <label for='time'>Length of time:</label>
          <select name='time' class='time'>
              <option value='1'>1 day</option>
              <option value='7' selected>1 week</option>
              <option value='30'>1 month</option>
          </select>
          <div class='error'>{{ $errors->first('time') }}</div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn-primary">Borrow item</button>

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
