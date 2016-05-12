<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'S.M.' --}}
        @yield('title','S.M.')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!--<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">-->
    <script src="https://use.fontawesome.com/207693703c.js"></script>

    <script src='/js/hide-flash.js'></script>

    <link href='/css/main.css' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600%7CRaleway:400,700%7cRoboto:300' rel='stylesheet' type='text/css'>


    @yield('head')

</head>
<body>

    @if(Session::get('message') != null)
        <div class='flash_message'>{{ Session::get('message') }}</div>
    @endif

    <header>

      <div class='menu'>
        <ul>

          <li>
            <a class='pushl' href="/"><i class='fa fa-home'></i> Home</a>
          </li>

          <li>
            <a href="#"><i class='fa fa-book'></i> Books ⌄</a>
            <ul>
              <li><a href="/books"><i class='fa fa-eye'></i> View all books</a></li>
              <li><a href="/books/add"><i class='fa fa-plus'></i> Add a new book</a></li>
              <li><a href="/newbooks"><i class='fa fa-star'></i> View newest books</a></li>
            </ul>
          </li>
          <li>
            <a class='pushr' href="#"><i class='fa fa-flag'></i> Equipment ⌄</a>
            <ul>
              <li><a href="/equipment"><i class='fa fa-eye'></i> View all equipment</a></li>
              <li><a href="/equipment/add"><i class='fa fa-plus'></i> Add new equipment</a></li>
              <li><a href="/newequipment"><i class='fa fa-star'></i> View newest equipment</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class='fa fa-search'></i> Search ⌄</a>
            <ul>
              <li><a href='/books/search'><i class='fa fa-book'></i> Search for books</a></li>
              <li><a href='/equipment/search'><i class='fa fa-flag'></i> Search for equipment</a></li>
            </ul>
          </li>
          <li>
            <div id='menu'>
              <div id="login">
                @if(Auth::check())
                  <li>
                    <a class='loginfields' href="#"><i class='fa fa-bars'></i> {{$user->first_name}}</a>
                    <ul>
                      <li><a class='loggedinas' href="#"><i class='fa fa-user'></i> Logged in as {{$user->first_name}}</a></li>
                      <li><a href="/logout"><i class='fa fa-lock'></i> Logout</a></li>
                    </ul>
                  </li>
                @else
                  <li><a class='loginfields' href="/login"><i class='fa fa-lock'></i> Login</a></li>
                  <li><a class='loginfields' href="/register"><i class='fa fa-key'></i> Register</a></li>
                @endif
              </div>
            </div>
          </li>

          <div class='clear'>

          </div>
        </ul>
      </div>
    </header>


    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        <span>&copy; {{ date('Y') }} Brandon Darby&nbsp;&nbsp;&nbsp;</span>
        <a href='https://github.com/brld/P4' class='fafa-github' target='_blank'> View on Github</a> &nbsp;&nbsp;
        <a href='http://P4.plezza.com' class='fafa-link' target='_blank'> View Live</a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')


</body>
</html>
