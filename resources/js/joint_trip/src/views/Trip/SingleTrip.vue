<template>
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
              <li class="personal-main-menu-link">
                <router-link to="/" class="btm-go-main">На Главную</router-link>
              </li>
              <li class="personal-main-menu-link">
                <router-link to="/account_user" class="btm-go-main">Личные данные</router-link>
              </li>
              <li class="personal-main-menu-link">
                <router-link to="/car_user" class="btm-go-main">Мой автомобиль</router-link>
              </li>
              <li class="personal-main-menu-link  active">
                <a href="/newTrip" class="btm-go-main">Мои поездки</a>
              </li>
              <li class="personal-main-menu-link">
                <a href="#" class="btm-go-main">Уведомления</a>
              </li>
            </ul>
          </div>
          <div class="personal-main-info">
            <h1>Ggagf</h1>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
