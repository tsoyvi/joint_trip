<template>
    <main class="main-content">
        <div class="container">
            <div class="login-form">
                <div class="login-form-row">
                    <h1 class="login-form-header">Регистрация</h1>
                    <div class="login-form-input">
                        <input type="text" placeholder="Имя" name="name" v-model="user.name"
                        autocomplete="off" @keyup="input();">
                    </div>
                    <div class="login-form-input">
                        <input type="email" placeholder="Эл. почта" name="login"
                          v-model="user.email">
                    </div>
                    <div class="login-form-input">
                        <input type="password" placeholder="Пароль" name="password"
                          v-model="user.password">
                    </div>
                    <label for="accept" class="login-form-remember">
                        <div>Регистрируясь, я принимаю <a target="_blank" href="#">условия</a></div>
                        <input id="accept" type="checkbox" name="accept" v-model="checkedAccept">
                    </label>
                    <div class="login-form-btn-wrapper">
                      <button class="login-form-btn" @click="handleSubmit()" :disabled="buttonLock">
                        <div class="button-label">Зарегистрироватья!</div>
                      </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>

import { mapActions } from 'vuex';

export default {
  name: 'RegisterUser',

  data() {
    return {
      user: {
        name: '',
        login: '',
        email: '',
        password: '',
      },
      checkedAccept: false,
      count: null,
      buttonLock: false,
      // sitekey: '6LfakIEfAAAAAI_bxI_b_2pAYplveVdcsyiVL4K2',

    };
  },

  computed: {
    // Здесь причисляем методы (функции) которые отдают нам данные из хранилища (store)
    // ...mapGetters(['material', 'user']),
  },

  methods: {
    // Здесь причисляем методы (функции) которые будут вызываться нами в этом блоке.
    // Они хранятся в хранилище  (store)
    ...mapActions(['register']),

    async handleSubmit() {
      if (this.checkedAccept) {
        // Определяем количество символов в полях
        const passCount = +this.user.password.length;
        const emailCount = +this.user.email.length;
        const nameCount = +this.user.name.length;
        const checkSum = (nameCount) * (-1);

        if (passCount > 3 && emailCount > 3 && nameCount > 0) {
          // Блокируем кнопку чтобы не пользователь не нажал ее еще раз пока сервер обрабатывает запрос
          this.buttonLock = true;

          if (checkSum >= this.count) {
            // отправляем запрос на сервер
            const result = await this.register(this.user);

            if (result) {
              this.$router.push(window.laravelPath || '/login_user');
            }
          } else {
            // если бот то через 2 сек переадресовываем
            window.setTimeout(() => {
              this.$router.push('/');
            }, 2000);
          }
        }
      }
    },

    input() {
      this.count -= 1;
    },
  },
  created() {
    /* if (typeof window.isLoggedin !== 'undefined' || window.isLoggedin === true) {
      this.$router.push(window.laravelPath || '/');
    } */

    /*
    const $script = document.createElement('script');
    $script.async = true;
    $script.src = 'https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit';
    document.head.appendChild($script);
    */
  },
};
</script>

<style>
</style>
