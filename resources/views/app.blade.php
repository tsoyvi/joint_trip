<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>ПоПути!</title>
 
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  
  <!-- bootstrap -->
  <link type="text/css" rel="stylesheet" href="/css/bootstrap-5.0.2/css/bootstrap.min.css">
    <script src="/css/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    
  <link rel="stylesheet" href="/css/style.css">   

</head>

<body>
  @if (Auth::check())
  <script>
    // Для проверки авторизован пользователь на сервере или нет
    window.isLoggedin = true;
  </script>
  @endif


  <div id="app"></div>
  <script src="{{ mix('js/main.js') }}" type="text/javascript"></script>
</body>

</html>