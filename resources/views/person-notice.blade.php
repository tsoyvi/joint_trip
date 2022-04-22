<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ПоПути!</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- bootstrap -->
    <!--<link type="text/css" rel="stylesheet" href="/css/bootstrap-5.0.2/css/bootstrap.min.css">
      <script src="/css/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
      -->

</head>

<body>
@if (Auth::check())
<script>
    window.isLoggedin = true;
</script>
@endif

<header class="main-header">
    <div class="container">
        <div class="header-wrapper">
            <div class="left-head">
                <a href="#">
                    <img src="/images/logo.png" alt="" class="logo">
                </a>
                <div class="site-name"><span style="color: rgb(0, 175, 245)">П</span>о<span style="color: rgb(0, 175, 245)">П</span>ути!</div>
            </div>
            <div class="center-head"></div>
            <div class="right-head">
                <a href="#">Найти поезду</a>
                <a href="#">Опубликовать поездку</a>
                <a href="#">Вход</a>
            </div>
        </div>
    </div>
</header>

<main class="main-content">
    <section class="personal">
        <div class="container">
            <div class="personal-header">
                <h1 class="personal-header-text">Личный кабинет</h1>
            </div>
        </div>
    </section>
    <section class="personal">
        <div class="container">
            <div class="personal-main">
                <div class="personal-main-menu">
                    <ul class="personal-main-menu-list">
                        <li class="personal-main-menu-link" ><a href="app.blade.php" class="btm-go-main">На Главную</a></li>
                        <li class="personal-main-menu-link "><a href="person-main.blade.php" class="btm-go-main" >Личные данные</a></li>
                        <li class="personal-main-menu-link "><a href="personal-car.blade.php" class="btm-go-main">Мой автомобиль</a></li>
                        <li class="personal-main-menu-link"><a href="personal-drive.blade.php" class="btm-go-main">Мои поездки</a></li>

                        <li class="personal-main-menu-link active"><a href="personal-notice.blade.php" class="btm-go-main">Уведомления</a></li>
                    </ul>
                </div>
                <div class="personal-main-info">
                    <h1 class="personal-main-info-header">Уведомления</h1>
                    <div class="personal-drive-archive">
                        <table>
                            <tr class="personal-drive-archive-header">
                                <th>№</th>
                                <th>Отправитель</th>
                                <th>Сообщение</th>
                            </tr>
                            <tr class="personal-drive-archive-text">
                                <td>2</td>
                                <td>Сервис ПоПути</td>
                                <td>Вы присоединились к поездке...</td>
                            </tr>
                            <tr class="personal-drive-archive-text">
                                <td>1</td>
                                <td>Сервис ПоПути</td>
                                <td>Вы зарегистрировались в сервисе ПоПути</td>
                            </tr>
                        </table>
                    </div>
                    <div class="personal-drive-empty isset-drive">
                        <h2 class="personal-drive-empty-text" id="drive-empty">Поездки не найдены</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="footer-box">
        <div class="container">
            <div class="col-4">
                <div class="col-4-item">
                    <ul>
                        <li><a href="#">Как работает ПоПути</a></li>
                    </ul>
                </div>
                <div class="col-4-item">
                    <ul>
                        <li><a href="#">Условия использования</a></li>
                    </ul>
                </div>
                <div class="col-4-item">
                    <ul>
                        <li><a href="#">О нас</a></li>
                    </ul>
                </div>
                <div class="col-4-item">
                    <ul>
                        <li><a href="#">Напишите нам</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            Copyright © 2022, NineGroup
        </div>
    </div>
</footer>


{{-- <div id="app">
</div>
<script src="{{ mix('js/main.js') }}" type="text/javascript"></script> --}}
</body>

</html>