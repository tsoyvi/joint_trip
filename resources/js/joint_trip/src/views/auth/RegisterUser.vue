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
                    </div>
                </div>
            </form>
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
      if (this.user.password.length > 0) {
        const result = await this.register(this.user);

        if (result) {
          this.$router.push(window.laravelPath || '/');
        }
      }
    },
  },
  created() {
    if (typeof window.isLoggedin !== 'undefined' || window.isLoggedin === true) {
      this.$router.push(window.laravelPath || '/');
    }
  },
};
</script>
