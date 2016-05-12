@extends('master')

@section('title')
    Borrow a book {{ $book->title }}
@stop

@section('content')

    <h1>Borrow a book {{ $book->title }}</h1>

    <form method='POST' action='/books/borrow'>

        <input type="hidden" name="id" value="{{$book->id}}">

        {{ csrf_field() }}

        <div class='form-group'>
          <label for='time'>Length of time:</label>
          <select name='time' class='time'>
              <option value='1 day'>1 day</option>
              <option value='1 week' selected>1 week</option>
              <option value='1 month'>1 month</option>
          </select>
          <div class='error'>{{ $errors->first('time') }}</div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn-primary">Borrow book</button>

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
