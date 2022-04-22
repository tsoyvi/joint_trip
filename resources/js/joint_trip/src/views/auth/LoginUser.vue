<template>
  <div>
    <section class="">

      <div class="login-fullscreen-bg">
            <div class="login-overlay">

             <h2 class="login-title">Аутентификация / Авторизация</h2>

                <div class="login-overlay-block">

                  <div class="login-login">
                    <h1>Аутентификация</h1>
                    <form method="post" action="index.html">
                      <p>
                        <label for="login">
                        <input type="text" name="login" placeholder="Логин" id="login"
                          v-model="user.login">
                          </label>
                      </p>
                      <p>
                        <label for="password">
                        <input type="password" name="password"  placeholder="Пароль"
                          id="password" v-model="user.password">
                        </label>
                      </p>
                      <p class="remember_me">
                        <label for="remember">
                          <input type="checkbox" name="remember" id="remember_me"
                          v-model="user.remember">
                          Запомнить меня
                        </label>
                      </p>
                      <p class="login-submit">
                        <button  class="btn btn-primary"
                            @click="handleSubmit"
                            >Войти
                        </button>
                      </p>
                    </form>
                  </div>

                  <!--<div class="login-help">
                    <a href="index.html">Забыли пароль?</a> Восстановите его!
                  </div> -->
                </div>
            </div>

        </div>
    </section>

  </div>
</template>

<script>

import { mapActions } from 'vuex';
// import ResultsRows from '../components/ResultsRows.vue';

export default {
  name: 'loginUser',
  data() {
    return {
      user: {
        email: '',
        login: '',
        password: '',
        remember: '',
      },
    };
  },

  computed: {
    // Здесь причисляем методы (функции) которые отдают нам данные из хранилища (store)
    // ...mapGetters(['material', 'user']),
  },

  methods: {
    // Здесь причисляем методы (функции) которые будут вызываться нами в этом блоке.
    // Они хранятся в хранилище  (store)
    ...mapActions(['login']),

    // Метод который вызывает нажатие кнопки
    handleSubmit(e) {
      e.preventDefault();
      // Простая валидация на заполненность полей
      if (this.user.password.length > 0 && this.user.login.length > 0) {
        this.login(this.user);
      }
    },
  },

  // Хука, которая вызывается при создании этой страницы
  // почитать можно https://v3.ru.vuejs.org/ru/api/options-lifecycle-hooks.html
  created() {
    console.log(window.isLoggedin);
    if (typeof window.isLoggedin !== 'undefined') {
      if (window.isLoggedin === true) {
        this.$router.push(window.laravelPath || '/');
      }
    }
  },

};

</script>
