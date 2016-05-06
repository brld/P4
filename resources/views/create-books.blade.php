@extends('master')

@section('title')
    Add a new book
@stop

@section('content')

    <h1>Add a new book</h1>

    <form method='POST' action='/books/add'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{ old('title','Camp Wente Info') }}'
            >
           <div class='error'>{{ $errors->first('title') }}</div>
        </div>

        <div class='form-group'>
          <label for='owner_id'>Owner:</label>
          <select name='owner_id' class='owner_id'>
            @foreach($owners_for_dropdown as $owner_id => $owner_name)
              <option value='{{ $owner_id }}'>{{ $owner_name }}</option>
            @endforeach
          </select>
          <div class='error'>{{ $errors->first('owner') }}</div>
        </div>

        <div class='form-group'>
          <fieldset>
            <legend>Tags:</legend>
            @foreach ($tags_for_checkboxes as $tag_id => $tag_name)
            <label><br>
              <input
                type="checkbox"
                value='{{$tag_id}}'
                name="tags[]"
              >
              {{$tag_name}}
            </label>
            @endforeach
            <div class='error'>{{ $errors->first('owner') }}</div>
          </fieldset>
        </div>

      <div class='form-instructions'>
          All fields are required
      </div>

      <button type="submit" class="btn-primary">Add book</button>

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
