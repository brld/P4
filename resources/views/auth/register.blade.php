<!DOCTYPE html>
<html>
  <head>
    <title>
      S.M. Register
    </title>
    <meta charset='utf-8'>
    <script src="https://use.fontawesome.com/207693703c.js"></script>

    <script src='/js/hide-flash.js'></script>

    <link href='/css/login.css' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600%7CRaleway:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body>

    <div class="register-page">

    <form method='POST' action='/register' class='register-form'>
        {!! csrf_field() !!}

        <p class='plogin'>Register</p>

        <div class='form-group'>
            <label for='first_name'><i class='fa fa-user' id='fauserregister1'></i></label>
            <input type='text' name='first_name' id='first_name' placeholder='First name' value='{{ old('first_name') }}'>
            <div class='error'>{{ $errors->first('first_name') }}</div>
        </div>

        <div class='form-group'>
            <label for='last_name'><i class='fa fa-user' id='fauserregister2'></i></label>
            <input type='text' name='last_name' id='last_name' placeholder='Last name' value='{{ old('last_name') }}'>
            <div class='error'>{{ $errors->first('last_name') }}</div>
        </div>

        <div class='form-group'>
            <label for='email'><i class='fa fa-envelope' id='faemailregister'></i></label>
            <input type='text' name='email' id='email' placeholder='i.e. john@example.com' value='{{ old('email') }}'>
            <div class='error'>{{ $errors->first('email') }}</div>
        </div>

        <div class='form-group'>
            <label for='password'><i class='fa fa-lock' id='fapasswordregister1'></i></label>
            <input type='password' name='password' id='password' placeholder='Password'>
            <div class='error'>{{ $errors->first('password') }}</div>
        </div>

        <div class='form-group'>
            <label for='password_confirmation'><i class='fa fa-lock' id='fapasswordregister2'></i></label>
            <input type='password' name='password_confirmation' id='password_confirmation' placeholder='Confirm password'>
            <div class='error'>{{ $errors->first('password_confirmation') }}</div>
        </div>

        <button type='submit' class='btn-primary'>Register</button>
        <p class='message'>Already have an account? <a href='/login'>Login here...</a></p>

      </form>
    </div>
  </body>
</html>
