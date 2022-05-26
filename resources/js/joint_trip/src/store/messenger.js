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
    ADD_MESSAGE(state, message) {
      const mess = message;
      mess.user = [{ id: message.from_user_id }];
      state.userMessages.push(mess);
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

    async UpdateUserMessagesRequest({ commit }, userId) {
      const result = await requests.getJson(`api/chats/${userId}`);
      if (result.success === true) {
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
      const result = await requests.postJson('api/chats', message);
      // console.log(searchData);
      if (result.success === true) {
        // console.log(result.data.userMessage);
        commit('ADD_MESSAGE', result.data.userMessage);
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
