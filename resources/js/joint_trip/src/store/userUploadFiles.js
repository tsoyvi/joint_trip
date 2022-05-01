import axios from 'axios';

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
    async submitUserFile({ commit }, data) {
      commit('UPLOAD_FILE');
      axios.post(
        data.url,
        data.formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        },
      ).then((response) => {
        console.log(response.data);
        this.dispatch('checkLogin');
        commit('UPLOADED_FILE');
      })
        .catch(() => {
          console.log('FAILURE!!');
        });
    },
  },

  modules: {
  },

});
