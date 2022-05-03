import axios from 'axios';
import router from '../router';
import requests from './blocks/requests';

export default ({
  state: {
    status: false,
    user: {},
    userCar: {},
  },

  getters: {
    authStatus(state) {
      return state.status;
    },

    user(state) {
      return state.user;
    },

    userCar(state) {
      return state.userCar;
    },

  },

  mutations: {
    AUTH_REQUEST(state) {
      state.status = 'loading';
    },

    AUTH_SUCCESS(state, user) {
      // Костыль по раскодировке JSON из БД
      const arr = user;
      arr.messengers = JSON.parse(arr.messengers);
      //
      state.user = arr;
      state.status = true;
      window.isLoggedin = true;
    },

    USER_CAR(state, car) {
      state.userCar = car;
      state.status = true;
      window.isLoggedin = true;
    },

    AUTH_REGISTER() {
    },

    AUTH_ERROR(state) {
      state.status = false;
      window.isLoggedin = false;
    },

    LOGOUT(state) {
      state.status = false;
      state.user = {};
      window.isLoggedin = false;
    },

    UPDATE_USER_DATA() {
    },

  },

  actions: {
    // Здесь мы делаем запрос на сервер для проверки авторизации пользователя
    //
    async checkLogin({ commit }) {
      commit('AUTH_REQUEST');
      const result = await requests.getJson('api/check_login');

      if (result.success === true) {
        commit('AUTH_SUCCESS', result.data.user);
        commit('USER_CAR', result.data.car);
        return true;
      }
      commit('AUTH_ERROR');
      this.dispatch('addError', result.error);
      return false;
    },

    async register({ commit }, user) {
      try {
        const sanctum = await axios.get('/sanctum/csrf-cookie');
        console.log(sanctum.headers);
        if (sanctum) {
          const { data } = await axios.post('api/register', user);
          if (data.success) {
            console.log(data);
            commit('AUTH_REGISTER', data.user);
            return true;
          }
          alert(data.message);
        }
        return false;
      } catch (error) {
        alert(Object.entries(error.response.data.errors).map(([k, v]) => `${k}: ${v}`).join(', '));
        return false;
      }
    },

    async login({ commit }, user) {
      axios.get('/sanctum/csrf-cookie').then(() => {
        axios.post('api/login', {
          email: user.email,
          password: user.password,
          remember: user.remember,
        })
          .then((response) => {
            if (response.data.success) {
              commit('AUTH_SUCCESS', response.data.user);
              commit('USER_CAR', response.data.car);
              router.push(window.laravelPath || '/');
            } else {
              commit('AUTH_ERROR', response.data.message);
            }
          });
      });
    },

    async logout({ commit }) {
      const { data } = await axios.get('api/logout');
      if (data.success) {
        commit('LOGOUT');
        router.push('/');
      }
    },

    async updateUserDataRequest({ commit }, user) {
      try {
        console.log(user);

        const { data } = await axios.put(`api/update_user_data/${user.id}`, user);
        if (data.success === true) {
          commit('UPDATE_USER_DATA');
          // alert(data.message);
          this.dispatch('checkLogin');
          return true;
        }
        alert(data.message);
        return false;
      } catch (error) {
        alert(Object.entries(error.response.data.errors).map(([k, v]) => `${k}: ${v}`).join(', '));
        return false;
      }
    },

    async updateUserCarRequest({ commit }, userCar) {
      try {
        console.log(userCar);

        const { data } = await axios.put(`api/update_user_car/${userCar.id}`, userCar);
        if (data.success === true) {
          commit('UPDATE_USER_DATA');
          alert(data.message);
          return true;
        }
        alert(data.message);
        return false;
      } catch (error) {
        alert(Object.entries(error.response.data.errors).map(([k, v]) => `${k}: ${v}`).join(', '));
        return false;
      }
    },

  },

  modules: {
  },

});
