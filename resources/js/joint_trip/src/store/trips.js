import requests from './blocks/requests';

export default ({
  state: {
    userTrips: [],
    userTripsАrchive: [],

    userTripsPassenger: [],
    foundTrips: [],
    userTripsPassengerАrchive: [],

  },

  getters: {
    userTrips(state) {
      return state.userTrips;
    },

    userTripsАrchive(state) {
      return state.userTripsАrchive;
    },

    userTripsPassenger(state) {
      return state.userTripsPassenger;
    },

    userTripsPassengerАrchive(state) {
      return state.userTripsPassengerАrchive;
    },

    foundTrips(state) {
      return state.foundTrips;
    },

  },

  mutations: {
    ADD_TRIP(state, formData) {
      state.userTrips = [];
      state.userTripsАrchive = [];

      formData.forEach((element) => {
        console.log(element.completed);
        if (element.completed) {
          state.userTripsАrchive.push(element);
        } else {
          state.userTrips.push(element);
        }
      });

      // state.userTrips = formData;
    },

    DELETE_TRIP(state, formData) {
      console.log('ADD_TRIP()');
      state.userTrips = [];
      console.log(formData);
    },

    ADD_TRIP_PASSENGER(state, formData) {
      state.userTripsPassenger = [];
      state.userTripsPassengerАrchive = [];

      formData.forEach((element) => {
        console.log(element.pivot.completed);
        if (element.pivot.completed) {
          state.userTripsPassengerАrchive.push(element);
        } else {
          state.userTripsPassenger.push(element);
        }
      });

      // state.userTripsPassenger = formData;
    },

    ADD_FOUND_TRIPS(state, data) {
      state.foundTrips = data;
    },

    RESET_FOUND_RESULT(state) {
      state.foundTrips = [];
    },

    RESERVATION_SEAT() {
    },

    END_TRIP() {

    },

  },

  actions: {
    /**
     * Добавления поездки пользователем как водитель
     * @param
     * @param
     * @returns
     */
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

    /**
     * Запрос на список поездок созданных пользователем
     * @param
     * @returns
     */
    async userTripsRequest({ commit }) {
      // commit('UPLOAD_FILE');

      const result = await requests.getJson('api/trip');
      if (result.success === true) {
        // console.log(result.data.passenger[0].user_trip_passenger);
        commit('ADD_TRIP', result.data.trips);
        commit('ADD_TRIP_PASSENGER', result.data.passenger[0].user_trip_passenger);

        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

    /**
     * Запрос на получение списка ездок
     * @param
     * @returns
     */
    async searchTripsRequest({ commit }, searchData) {
      commit('RESET_FOUND_RESULT');

      const result = await requests.postJson('api/search_trips', searchData);
      // console.log(searchData);
      if (result.success === true) {
        // console.log(result.data);
        commit('ADD_FOUND_TRIPS', result.data.trips);

        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

    async reservationSeatRequest({ commit }, reservationData) {
      commit('RESET_FOUND_RESULT');

      const result = await requests.postJson('api/reservation_seat', reservationData);
      // console.log(searchData);
      if (result.success === true) {
        console.log(result.data);
        commit('RESERVATION_SEAT', result.data.trips);

        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

    // Оптимизировать код!
    async cancelTripDriverRequest({ commit }, trip) {
      const result = await requests.deleteJson(`/api/trip/${trip.id}`);

      if (result.success === true) {
        commit('DELETE_TRIP', result);
        console.log(result.data);

        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

    // Оптимизировать код!
    async cancelTripPassengerRequest({ commit }, trip) {
      const result = await requests.deleteJson(`/api/reservation_seat/${trip.id}`);

      if (result.success === true) {
        commit('DELETE_TRIP', result);
        console.log(result.data);

        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

    // Оптимизировать код!
    async endTripPassenger({ commit }, trip) {
      const result = await requests.putJson(`api/trip/${trip.id}`, trip);

      if (result.success === true) {
        commit('END_TRIP', result);
        console.log(result.data);
        this.dispatch('userTripsRequest');
        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

    // Оптимизировать код!
    async endTripDriverRequest({ commit }, trip) {
      const tripReq = trip;
      tripReq.driver = true;
      const result = await requests.putJson(`api/trip/${trip.id}`, tripReq);

      if (result.success === true) {
        commit('END_TRIP', result);
        console.log(result.data);
        // this.dispatch('userTripsRequest');
        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

  },

  modules: {
  },

});
