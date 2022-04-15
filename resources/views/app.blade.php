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
  <section class="main-form">
      <div class="main-form-content">
          <h1 class="main-form-header">Поездки на ваш выбор по самым низким ценам</h1>
          <div class="main-form-box">
              <form action="" method="post">
                  <div class="form-input-box">
                      <input type="search" placeholder="Откуда" name="from" value="">
                  </div>
                  <hr class="search-form-delimeter">
                  <div class="form-input-box">
                      <input type="search" placeholder="Куда" name="to" value="">
                  </div>
                  <hr class="search-form-delimeter">
                  <div class="search-button-date-box">
                      <button type="button" class="search-button-date">
                          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="kirk-icon sc-ksdxgE eqtwsd" width="24" height="24" aria-hidden="true"><g fill="none" fill-rule="evenodd"><rect x="3.5" y="3.5" width="17" height="17" rx="3.5" stroke="#708C91"></rect><path d="M3.5 7C3.5 5.067 5.067 3.5 7 3.5H17C18.933 3.5 20.5 5.067 20.5 7V8.5H3.5V7Z" stroke="#708C91"></path><rect x="6" y="11" width="2" height="2" rx="1" fill="#708C91"></rect><rect x="6" y="15" width="2" height="2" rx="1" fill="#708C91"></rect><rect x="11" y="11" width="2" height="2" rx="1" fill="#708C91"></rect><rect x="11" y="15" width="2" height="2" rx="1" fill="#708C91"></rect><rect x="16" y="11" width="2" height="2" rx="1" fill="#708C91"></rect></g></svg>
                          <span class="">Сегодня</span>
                      </button>
                      <div class=""></div>
                      <hr class="search-form-delimeter">
                  </div>
                  <div class="form-date-box">
                      <button type="button" class="" title="Количество бронируемых мест">
                          <svg viewBox="0 0 19 20" xmlns="http://www.w3.org/2000/svg" class="kirk-icon sc-ksdxgE eqtwsd" width="18" height="18" aria-hidden="true"><g fill="none"><path d="M9.583 9.167a3.75 3.75 0 0 0 3.75-3.75v-.834a3.75 3.75 0 0 0-7.5 0v.834a3.75 3.75 0 0 0 3.75 3.75zm0 .833A4.584 4.584 0 0 1 5 5.417v-.834a4.584 4.584 0 0 1 9.167 0v.834A4.584 4.584 0 0 1 9.583 10zM18.333 17.007v1.743c0 .23-.186.417-.416.417H1.25a.417.417 0 0 1-.417-.417v-1.743a3.742 3.742 0 0 1 2.752-3.616c2.033-.554 4.08-.891 5.998-.891 1.92 0 3.966.337 5.998.891a3.742 3.742 0 0 1 2.752 3.616zm-.833 0a2.908 2.908 0 0 0-2.138-2.812c-1.967-.537-3.944-.862-5.779-.862-1.834 0-3.811.325-5.779.862a2.908 2.908 0 0 0-2.137 2.812v1.326H17.5v-1.326z" fill="#708C91"></path></g></svg>
                          <span class="">1 </span>
                      </button>
                      <div class=""></div>
                  </div>
                  <div class="form-submit-box">
                      <button type="submit">
                          <span class="">Поиск</span>
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </section>
  <section class="about">
      <div class="container">
          <div class="col-3">
              <div class="col-3-item">
                  <img src="/images/importo-ico.png" alt="">
                  <h2>Импортозамещение во всем!</h2>
                  <div>В современных условиях для Россиян лучше пользоваться нашими, русскими сервисами. Это гарантирует стабильность предоставляемых услуг и помогает нашей экономике стать сильнее.</div>
              </div>
              <div class="col-3-item">
                  <img src="/images/rub-ico.png" alt="">
                  <h2>Поездки по самой низкой цене</h2>
                  <div>Куда бы вы ни собирались, на автобусе или с попутчиками, вы сможете найти свою идеальную поездку среди множества маршрутов и доехать по самой низкой цене.</div>
              </div>
              <div class="col-3-item">
                  <img src="/images/click-ico.png" alt="">
                  <h2>Всего пара кликов для поездка!</h2>
                  <div>Найти и забронировать поездку очень просто. Наше приложение очень простое, а умный алгоритм за пару минут найдет водителя поблизости. Вам останется нажать пару кнопок для бронирования.</div>
              </div>
          </div>
      </div>
  </section>
  <section class="about">
      <div class="container">
              <div class="col-2">
                  <div class="col-2-item"><img src="/images/driver-passenger.jpg" alt=""></div>
                  <div class="col-2-item">
                      <h2>Вы зарулем? Тогда экономьте!</h2>
                      <div>Зарегистрируйтесь как водитель, берите попутчиков и экономьте на бензине. Потратьте всего пару минут и опубликуйте свою первую поездку. Вы готовы?</div>
                      <div><a href="#" class="main-btn">Зарегистироваться как водитель!</a></div>
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