@extends('master')

@section('content')

    <p>Already have an account? <a href='/login'>Login here...</a></p>

    <h1>Register</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/register'>
        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='first_name'><i class='fa fa-user' id='fauser'></i></label>
            <input type='text' name='first_name' id='first_name' placeholder='First name' value='{{ old('first_name') }}'>
        </div>

        <div class='form-group'>
            <label for='last_name'><i class='fa fa-user' id='fauser'></i></label>
            <input type='text' name='last_name' id='last_name' placeholder='Last name' value='{{ old('last_name') }}'>
        </div>

        <div class='form-group'>
            <label for='email'><i class='fa fa-envelope' id='faemail'></i></label>
            <input type='text' name='email' id='email' placeholder='i.e. john@example.com' value='{{ old('email') }}'>
        </div>

        <div class='form-group'>
            <label for='password'><i class='fa fa-lock' id='fapassword'></i></label>
            <input type='password' name='password' id='password' placeholder='Password'>
        </div>

        <div class='form-group'>
            <label for='password_confirmation'><i class='fa fa-lock' id='fapassword'></i></label>
            <input type='password' name='password_confirmation' id='password_confirmation' placeholder='Confirm password'>
        </div>

        <button type='submit' class='btn-primary'>Register</button>

    </form>

@stop
