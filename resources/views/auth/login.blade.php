@extends('master')

@section('content')

    <p>Don't have an account? <a href='/register'>Register here...</a></p>

    <h1>Login</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/login'>

        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='email'><i class='fa fa-envelope' id='faemail'></i></label>
            <input type='text' name='email' id='email' placeholder='Your email' value='{{ old('email') }}'>
        </div>

        <div class='form-group'>
            <label for='password'><i class='fa fa-lock' id='fapassword'></i></label>
            <input type='password' name='password' id='password' placeholder='Your password' value='{{ old('password') }}'>
        </div>

        <div class='form-group'>
            <input type='checkbox' name='remember' id='remember'>
            <label for='remember' class='checkboxLabel'>Remember me</label>
        </div>

        <button type='submit' class='btn btn-primary'>Login</button>

    </form>
@stop
