<template>
    <main class="main-content">
        <div class="container">
            <form class="login-form" method="post">
                <div class="login-form-row">
                    <h1 class="login-form-header">Регистрация</h1>
                    <div class="login-form-input">
                        <input type="text" placeholder="Имя" name="name" value="">
                    </div>
                    <div class="login-form-input">
                        <input type="email" placeholder="Эл. почта" name="login" value="">
                    </div>
                    <label for="accept" class="login-form-remember">
                        <div>Регистрируясь, я принимаю <a target="_blank" href="#">условия</a></div>
                        <input id="accept" type="checkbox" name="accept" checked="">
                    </label>
                    <div class="login-form-btn-wrapper" >
                        <button class="login-form-btn" type="submit">
                            <div class="button-label">Зарегистрироватья!</div>
                        </button>
      <section class="main-form">
      <div class="main-form-content">

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-default">
                    <div class="card-header">Register</div>
                    <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">
                                    Name
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                    class="form-control" v-model="user.name" required
                                           autocomplete="off">
                                </div>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label for="login" class="col-sm-4 col-form-label text-md-right">
                                    Login
                                <div class="col-md-6">
                                    <input id="login" type="text"
                                    class="form-control" v-model="user.login" required
                                            autocomplete="off">

                                </div>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">
                                    E-Mail Address
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control"
                                    v-model="user.email" required
                                            autocomplete="off">
                                </div>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    Password
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control"
                                    v-model="user.password"
                                           required autocomplete="off">
                                </div>
                                </label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary"
                                    @click="handleSubmit()">
                                        Register
                                    </button>
                                </div>
                            </div>
<!--
                        <div class="form-group">
                             <vue-recaptcha
                                ref="recaptcha"
                                size="invisible"
                                :sitekey="sitekey"
                                @verify="register"
                                @expired="onCaptchaExpired"
                              />
                              <button
                               type="submit"
                                 class="btn btn-primary btn-block">
                                  Sign Up
                                </button>
                        </div>
-->
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>

<script>

import { mapActions } from 'vuex';
// import VueRecaptcha from 'vue-recaptcha';

export default {
  name: 'RegisterUser',
  // components: { VueRecaptcha },

  data() {
    return {
      user: {
        name: '',
        login: '',
        email: '',
        password: '',
      },
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
      if (this.user.password.length > 0 && this.user.email.length > 0
      && this.user.login.length > 0) {
        const result = await this.register(this.user);

        if (result) {
          this.$router.push(window.laravelPath || '/login_user');
        }
      }
    },

    /*
    register(recaptchaToken) {
      this.$axios.post('https://yourserverurl.com/register', {
        email: this.email,
        password: this.password,
        recaptchaToken,
      });
    },
    /*
    onCaptchaExpired() {
      this.$refs.recaptcha.reset();
    },
    */
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
