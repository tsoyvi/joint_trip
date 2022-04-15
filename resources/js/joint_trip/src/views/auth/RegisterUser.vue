<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-default">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form>
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
                                           autofocus
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
