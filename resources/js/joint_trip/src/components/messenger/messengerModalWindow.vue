<template>
<!-- Модальное окно -->
<div class="modal fade" id="messengerModalWindow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Мессенджер</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>

            <div class="modal-body">
              <table class="table align-middle">
                <tbody>
                <tr>
                  <td rowspan="100" width="200px" style="vertical-align: top;">
                    <div class="list-group">
                      <button type="button" class="list-group-item list-group-item-action"
                          v-for="(user, index) in userChats" :key="index" @click="selectChat(user.id)">
                        <div>
                            <div style="display:block;">
                              <img v-if="user.image_link" class="driver-img" style="width: 25px; height: 25px;"
                                  :src="'storage/' + user.image_link" alt="avatar">
                              <img v-else class="driver-img" src="images/avatar-ico.png" style="width: 25px; height: 25px;" alt="avatar">
                            </div>
                            <div style="display:block;">
                              {{user.image_link}} {{user.name}} {{user.surname}} {{user.patronymic}}
                            </div>
                        </div>
                      </button>
                    </div>
                  </td>
                  <td>
                    <div style="height:500px; border: grey solid 1px; padding:5px; overflow-y: scroll;">
                      <div v-for="(message, index) in userMessages" :key="index">
                        <div v-bind:class="classObject(message.user[0].id)">
                          <!-- class="right-div">
                          classObject
                          -->
                        <div>
                            {{formatDateTimeToRus(message.created_at)}}
                          </div>
                          <div>
                            {{message.user[0].name}} {{message.user[0].surname}}  {{message.user[0].patronymic}}
                          </div>

                          <div style="font-size: 1.2em; background: rgba(103, 71, 248, 0.1);">
                            {{message.messages}}
                          </div>
                        <hr>
                      </div>
                    </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="input-group">
                      <textarea class="form-control custom-control" rows="1" style="resize:none" v-model="messageText"></textarea>
                      <button class="input-group-addon btn btn-primary" @click="sendMessage()">Отправить</button>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
<button @click="userMessageRequest()">Запрос сообщений</button>
</div>

<!-- Кнопка-триггер модального окна -->
<button type="button" data-bs-toggle="modal" data-bs-target="#messengerModalWindow"
  style="display: none;" id="openMessengerModalWindow">
</button>

</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import DateMixin from '../../mixins/date';

export default {
  name: 'messengerModalWindow',
  props: ['titleModalWindow'],
  mixins: [DateMixin],

  data() {
    return {
      messageText: '',
      toUserId: null,

    };
  },

  computed: {
    ...mapGetters(['user', 'userChats', 'userMessages']),

  },

  methods: {
    ...mapActions(['sendMessageRequest', 'userChatsRequest', 'userMessagesRequest']),

    openWindow(user) {
      console.log(user.id);
      this.toUserId = user.id;
      const openButtonModal = document.getElementById('openMessengerModalWindow');
      openButtonModal.click();
      this.userChatsRequest();
      this.selectChat(user.id);
    },

    async sendMessage() {
      const result = await this.sendMessageRequest({ messageText: this.messageText, toUserId: this.toUserId });
      if (result) {
        this.messageText = '';
        this.selectChat(this.toUserId);
      }
    },

    selectChat(userId) {
      this.userMessagesRequest(userId);
    },

    classObject(userId) {
      console.log(userId);
      if (userId === this.user.id) {
        return { 'right-div': 'right-div' };
      }
      return { 'left-div': 'left-div' };
    },

  },

};
</script>

<style>

.right-div {
  text-align: right;
  background: rgba(214, 210, 210, 0.5);
}

.left-div {
  text-align: left;
  background: rgba(115, 241, 12, 0.5);
}

</style>
