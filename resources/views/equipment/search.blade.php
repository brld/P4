@extends('master')

@section('title')
    Search for an item
@stop

@section('head')
    <link href='/css/search.css' rel='stylesheet'>
@stop

@section('content')

    <h1>Search for an item</h1>

    <form method='POST'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Search for an item title:</label>
            <input
                type='text'
                id='searchTerm'
                name='searchTerm'
            >
            <span id='loading'>Loading...</span>
        </div>

        <h2>Results:</h2>
        <div id='results'></div>

    </form>

@stop

@section('body')
    <script src="/js/search-equipment.js"></script>
@stop
