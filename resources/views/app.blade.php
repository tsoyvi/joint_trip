<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{env('APP_NAME')}}</title>

    <link type="text/css" rel="stylesheet" href="/css/bootstrap-5.0.2/css/bootstrap.min.css">
    
    <script src="/css/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    @if (Auth::check())
    <script>
        window.isLoggedin = true;
    </script>
    @endif

    <!-- ТЕСТИМ подключение шрифтов font-awesome.min.css -->
    <i class="fa fa-2x fa-spin fa-cog"></i>
    <i class="fa fa-2x fa-spin fa-spinner"></i>
    <i class="fa fa-2x fa-spin fa-refresh"></i>
    <i class="fa fa-2x fa-spin fa-circle-o-notch"></i>
    <i class="fa fa-2x fa-pulse fa-spinner"></i>

    <!-- Тестим подключение bootstrap -->

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Кнопка выпадающего списка
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Действие</a></li>
          <li><a class="dropdown-item" href="#">Другое действие</a></li>
          <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
        </ul>
    </div>



    <div id="app">
    </div>
    <script src="{{ mix('js/main.js') }}" type="text/javascript"></script>
</body>

</html>