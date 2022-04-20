import axios from 'axios';
// import router from '../router';

export default ({
  state: {
    status: false,
    trip: {},
  },

  getters: {

    trip(state) {
      return state.trip;
    },
  },

  mutations: {
    AUTH_REQUEST(state) {
      state.status = 'loading';
    },

    AUTH_SUCCESS(state, user) {
      state.status = true;
      state.user = user;
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
  },

  actions: {
    /*
    async register({ commit }, user) {
      try {
        const sanctum = await axios.get('/sanctum/csrf-cookie');
        console.log(sanctum.headers);
        if (sanctum) {
          const { data } = await axios.post('api/register', user);
          if (data.success) {
            console.log(1);
            commit('AUTH_REGISTER', data.user);
            return true;
          }
          // eslint-disable-next-line no-alert
          alert(data.message);
        }
        return false;
      } catch (error) {
        // eslint-disable-next-line no-alert
        alert(Object.entries(error.response.data.errors).map(([k, v]) => `${k}: ${v}`).join(', '));
        return false;
      }
    },
*/
    async newTrip({ commit }, trip) {
      console.log(trip);

      try {
        const sanctum = await axios.get('/sanctum/csrf-cookie');
        console.log(sanctum.headers);
        if (sanctum) {
          const { data } = await axios.post('api/new_trip', trip);
          if (data.success) {
            console.log(data);
            commit('AUTH_REGISTER', data.user);
            return true;
          }
          // eslint-disable-next-line no-alert
          alert(data.message);
        }
        return false;
      } catch (error) {
        // eslint-disable-next-line no-alert
        alert(Object.entries(error.response.data.errors).map(([k, v]) => `${k}: ${v}`).join(', '));
        return false;
      }
    },
    /*
    async logout({ commit }) {
      const { data } = await axios.get('api/logout');
      if (data.success) {
        commit('LOGOUT');
        router.push('/');
      }
    },
*/
  },

  modules: {
  },

});
