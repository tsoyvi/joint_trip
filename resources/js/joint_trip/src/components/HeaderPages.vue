<template>

<header class="main-header">
    <div class="container">
        <div class="header-wrapper">
            <div class="left-head">
              <router-link to="/">
                   <img src="/images/logo.png" alt="" class="logo">
              </router-link>
              <div class="site-name">
                  <span style="color: rgb(0, 175, 245)"
                  >П</span>о<span style="color: rgb(0, 175, 245)">П</span>ути!
              </div>
            </div>
            <div class="center-head"></div>
            <div class="right-head">
                <a href="#">Найти поезду</a>
                <a href="#">Опубликовать поездку</a>
                <router-link to="/login_user">Вход</router-link>

            </div>
        </div>
    </div>
</header>

</template>

<script>
export default {
  name: 'HeaderPages',

};
</script>
