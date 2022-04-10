<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{env('APP_NAME')}}</title>

    <link type="text/css" rel="stylesheet" href="/css/bootstrap-5.0.2/css/bootstrap.min.css">
    <script src="/css/bootstrap-5.0.2/js/bootstrap.min.js"></script>
    
    <link href="/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    @if (Auth::check())
    <script>
        window.isLoggedin = true;
    </script>
    @endif
<!--
    <i class="fa fa-2x fa-spin fa-cog"></i>
    <i class="fa fa-2x fa-spin fa-spinner"></i>
    <i class="fa fa-2x fa-spin fa-refresh"></i>
    <i class="fa fa-2x fa-spin fa-circle-o-notch"></i>
    <i class="fa fa-2x fa-pulse fa-spinner"></i>
-->
    <div id="app">
    </div>
    <script src="{{ mix('js/main.js') }}" type="text/javascript"></script>
</body>

</html>