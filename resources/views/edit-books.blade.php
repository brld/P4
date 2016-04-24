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
