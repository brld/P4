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
           <div class='error'>{{ $errors->first('item') }}</div>
        </div>

        <div class='form-group'>
          <label for='owner_id'>Owner:</label>
          <select name='owner_id' class='owner_id'>
            @foreach($owners_for_dropdown as $owner_id => $owner_name)

              <?php $selected = ($equipment->owner_id == $owner_id) ? 'SELECTED' : '' ?>
              <option value='{{ $owner_id }}' {{$selected}}>{{ $owner_name }}</option>
            @endforeach
          </select>
          <div class='error'>{{ $errors->first('owner') }}</div>
        </div>

        <div class='form-group'>
          <fieldset>
            <legend>Tags:</legend>
            @foreach ($equipment_tags_for_checkboxes as $tag_id => $tag_name)
            <label><br>
              <input
                type="checkbox"
                value='{{$tag_id}}'
                name="tags[]"
                {{ (in_array($tag_id,$tags_for_this_item))? 'CHECKED' : '' }}
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
