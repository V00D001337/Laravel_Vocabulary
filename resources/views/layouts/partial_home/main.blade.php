<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('layouts.partial_home.head')
</head>
<body>
    @include('layouts.partial_home.nav')

    @include('layouts.partial_home.header')
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @yield('content')
</div>
</div>
</div>
@include('layouts.partial_home.footer')
@include('layouts.partial_home.footerscripts')
</body>
</html>