<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
<div class="container">
            @if (Session::has('message'))
<div class="flash alert">
<p>{{ Session::get('message') }}</p>
    </div>
            @endif
            @yield('content')
        </div>
   </body>
</html>