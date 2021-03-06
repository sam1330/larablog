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
  @include('dashboard.partials.nav-header-main')
  
<div class="container">

  @include('dashboard.partials.sesion-flash-status')
  
  @yield('content')
  <script src="{{ asset('js/app.js') }}"></script>
</div>

</body>
</html>