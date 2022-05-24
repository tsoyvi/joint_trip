import requests from './blocks/requests';

export default ({
  state: {
    userChats: [
    ],

    userMessages: [
    ],

  },

  getters: {
    userChats(state) {
      return state.userChats;
    },
    userMessages(state) {
      return state.userMessages;
    },

  },

  mutations: {
    ADD_MESSAGE(state, data) {
      state.userDialogs = data;
    },

    ADD_USER_CHAT(state, chats) {
      state.userChats = chats;
    },

    SET_LIST_MESSAGES(state, messages) {
      state.userMessages = messages;
    },

    RESET_USER_LIST_MESSAGES(state) {
      state.userMessages = [];
    },

  },

  actions: {

    async userChatsRequest({ commit }) {
      const result = await requests.getJson('api/chats');
      if (result.success === true) {
        // console.log(result.data);
        commit('ADD_USER_CHAT', result.data.chats);

        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

    async userMessagesRequest({ commit }, userId) {
      console.log(userId);
      commit('RESET_USER_LIST_MESSAGES');
      const result = await requests.getJson(`api/chats/${userId}`);
      if (result.success === true) {
        console.log(result.data);
        commit('SET_LIST_MESSAGES', result.data.userMessages);

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
    async sendMessageRequest({ commit }, message) {
      console.log(message);

      const result = await requests.postJson('api/chats', message);
      // console.log(searchData);
      if (result.success === true) {
        console.log(result.data);
        commit('ADD_MESSAGE', result.data.message);
        this.dispatch('userChatsRequest');
        return true;
      }

      this.dispatch('addError', result.error);
      return false;
    },

  },

  modules: {
  },

});
