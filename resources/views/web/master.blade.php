<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modulo Admin</title>
  <link rel="stylesheet" href="{{ asset("css/app.css") }}">
  
</head>
<body>  
  @include('web.partials.nav-header-main')
<div class="container my-3" id="app">
  @yield('content')
</div>
@include('web.partials.footer-main')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>