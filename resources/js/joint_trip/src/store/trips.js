import requests from './blocks/requests';

export default ({
  state: {
    userTrips: [],
  },

  getters: {
    userTrips(state) {
      return state.userTrips;
    },

  },

  mutations: {
    ADD_TRIP(state, formData) {
      console.log('ADD_TRIP()');
      state.userTrips = formData;
    },
  },

  actions: {
    async addTripRequest({ commit }, formData) {
      // commit('UPLOAD_FILE');

      const result = await requests.postJson('api/trip', formData);
      if (result.success === true) {
        // поправить здесь подстановку данных или сделать простую подгрузку всего массива с БД
        commit('ADD_TRIP', formData);
        // this.dispatch('checkLogin');
        return true;
      }
      // commit('UPLOADED_FILE');
      this.dispatch('addError', result.error);
      return false;
    },

    async userTripsRequest({ commit }) {
      // commit('UPLOAD_FILE');

      const result = await requests.getJson('api/trip');
      if (result.success === true) {
        console.log(result.data);
        commit('ADD_TRIP', result.data.trips);
        // this.dispatch('checkLogin');
        return true;
      }
      // commit('UPLOADED_FILE');
      this.dispatch('addError', result.error);
      return false;
    },

  },

  modules: {
  },

});
