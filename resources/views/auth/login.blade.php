<!DOCTYPE html>
<html>
  <head>
    <title>
      S.M. Login
    </title>
    <meta charset='utf-8'>
    <script src="https://use.fontawesome.com/207693703c.js"></script>

    <script src='/js/hide-flash.js'></script>

    <link href='/css/login.css' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600%7CRaleway:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="login-page">


    <form method='POST' action='/login' class='login-form'>

        {!! csrf_field() !!}

        <p class='plogin'>Login</p>

        <div class='form-group'>
            <label for='email'><i class='fa fa-envelope' id='faemaillogin'></i></label>
            <input type='text' name='email' id='email' placeholder='Your email' value='{{ old('email') }}'>
        </div>

        <div class='form-group'>
            <label for='password'><i class='fa fa-lock' id='fapasswordlogin'></i></label>
            <input type='password' name='password' id='password' placeholder='Your password' value='{{ old('password') }}'>
        </div>

        <div class='form-group'>
            <input type='checkbox' name='remember' class='remember'>
            <label for='remember' class='checkboxLabel'>Remember me</label>
        </div>

        <button type='submit' class='btn btn-primary'>Login</button>
        <p class='message'>Don't have an account? <a href='/register'>Register here...</a></p>

    </form>

    </div>
  </body>
</html>
