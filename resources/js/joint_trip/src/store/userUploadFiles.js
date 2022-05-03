import requests from './blocks/requests';

export default ({
  state: {
    uploadFileSatatus: false,
  },

  getters: {
    uploadFileSatatus(state) {
      return state.uploadFileSatatus;
    },
  },

  mutations: {
    UPLOAD_FILE(state) {
      state.uploadFileSatatus = 'loading';
    },
    UPLOADED_FILE(state) {
      state.uploadFileSatatus = false;
    },
  },

  actions: {
    async submitUserFile({ commit }, userData) {
      commit('UPLOAD_FILE');

      const result = await requests.uploadFile(userData.url, userData.formData);
      if (result.success === true) {
        commit('UPLOADED_FILE');
        this.dispatch('checkLogin');
        return true;
      }
      commit('UPLOADED_FILE');
      this.dispatch('addError', result.error);
      return false;
    },
  },

  modules: {
  },

});
