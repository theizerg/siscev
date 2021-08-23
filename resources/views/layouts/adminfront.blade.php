<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title class="text-uppercase">BANDES | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/some.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/system.css') }}" rel="stylesheet" />

    <link rel="icon" href="{{ asset('images/logo/logo-login.png') }}">

    @stack('styles')
  </head>

  <body class="login" >
    <!--Page Content Here -->
    @yield('content')

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{ asset('js/some.js') }}"></script> 
    @stack('scripts')
  </body>
</html>
