<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'S.M.' --}}
        @yield('title','S.M.')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='/css/main.css' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600%7CRaleway:400,700' rel='stylesheet' type='text/css'>

    @yield('head')

</head>
<body>

    @if(Session::get('message') != null)
        <div class='flash_message'>{{ Session::get('message') }}</div>
    @endif

    @if(Session::get('message') != null)
    <header class='headerflash'>
    @else
    <header>
    @endif

      <div class='menu'>
        <ul>

          <li>
            <a class='pushl' href="/">Home</a>
          </li>

          <li>
            <a href="#">Books ⌄</a>
            <ul>
              <li><a href="/books">View all books</a></li>
              <li><a href="/books/add">Add a new book</a></li>
              <li><a href="/newbooks">View newest books</a></li>
            </ul>
          </li>
          <li>
            <a class='pushr' href="#">Equipment ⌄</a>
            <ul>
              <li><a href="/equipment">View all equipment</a></li>
              <li><a href="/equipment/add">Add new equipment</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Search ⌄</a>
            <ul>
              <li><a href='/books/search'>Search for books</a></li>
              <li><a href='/equipment/search'>Search for equipment</a></li>
            </ul>
          </li>
          <div id='menu'>
            @if(Auth::check())
            <div id="login">
            @else
            <div id="loginbig">
            @endif
              @if(Auth::check())
                <li><a class='loginfields' href="/logout">Logout</a></li>
              @else
                <li><a class='loginfields' href="/login">Login</a></li>
                <li><a class='loginfields' href="/register">Register</a></li>
              @endif
            </div>
          </div>

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
