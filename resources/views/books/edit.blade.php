@extends('master')

@section('title')
    Edit a book {{ $book->title }}
@stop

@section('content')

    <h1>Edit a book {{ $book->title }}</h1>

    <form method='POST' action='/books/edit'>

        <input type="hidden" name="id" value="{{$book->id}}">

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Title:</label>
            <input
                type='text'
                id='title'
                name='title'
                value='{{ $book->title }}'
            >
           <div class='error'>{{ $errors->first('title') }}</div>
        </div>

        <div class='form-group'>
          <label for='owner_id'>Owner:</label>
          <select name='owner_id' class='owner_id'>
            @foreach($owners_for_dropdown as $owner_id => $owner_name)

              <?php $selected = ($book->owner_id == $owner_id) ? 'SELECTED' : '' ?>
              <option value='{{ $owner_id }}' {{$selected}}>{{ $owner_name }}</option>
            @endforeach
          </select>
          <div class='error'>{{ $errors->first('owner_id') }}</div>
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
                {{ (in_array($tag_id,$tags_for_this_book))? 'CHECKED' : '' }}
              >
              {{$tag_name}}
            </label>
            @endforeach
          </fieldset>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn-primary">Save changes</button>


        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>


@stop
