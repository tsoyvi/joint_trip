<template>
    <h1 class="personal-main-info-header">Личные данные</h1>
    <div class="personal-main-info-data">
        <div class="personal-main-info-img">
            <img class="personal-img" src="images/avatar-ico.png" alt="#">
            <form enctype="multipart/form-data" method="post" id="form-add-img"
                class="personal-add-img-form">
                <div id="file-upload" class="personal-add-img-form-block">
                    <label class="label" for="uploade-file">
                        <input type="file" name="file" id="uploade-file">
                        <div class="personal-add-img-form-file">Выберите файл</div>
                    </label>
                </div>
                <div class="personal-add-img-form-block">
                    <input type="submit" class="personal-add-img-btn-form" value="Загрузить фото">
                </div>

            </form>
            <div class="personal-add-img">
                <button id="btn-add-img" class="personal-add-img-btn">Загрузить фото</button>
            </div>
        </div>
        <div class="personal-main-info-individ">
            <label class="personal-main-info-individ-head" for="surname">Фамилия:
                <p class="personal-main-info-individ-name">
                <input type="text" id="surname" class="personal-main-info-individ-name"
                    v-model="user.surname">
                </p>
            </label>
            <label class="personal-main-info-individ-head" for="name">Имя:
                 <p class="personal-main-info-individ-name">
                <input type="text" id="name" class="personal-main-info-individ-name"
                    v-model="user.name">
                </p>
            </label>

            <label class="personal-main-info-individ-head" for="patronymic">Отчество:
               <p class="personal-main-info-individ-name">
                <input type="text" id="patronymic" class="personal-main-info-individ-name"
                    v-model="user.patronymic">
                </p>
            </label>

            <label class="personal-main-info-individ-head" for="birth_day">Возраст:
              <p class="personal-main-info-individ-name">
                <input type="text" id="patronymic" class="personal-main-info-individ-name"
                    v-model="user.birth_day">
              </p>
            </label>
        </div>
        <div class="personal-main-info-contact">
            <label class="personal-main-info-individ-head" for="city">Город
             <p class="personal-main-info-individ-name">
               <input type="text" id="patronymic" class="personal-main-info-individ-name"
                    v-model="user.city">
            </p>
            </label>

            <label class="personal-main-info-individ-head" for="phone_number">Телефон
                <p class="personal-main-info-individ-name">
                <input type="text" id="patronymic" class="personal-main-info-individ-name"
                    v-model="user.phone_number">
                </p>
                </label>

            <label class="personal-main-info-individ-head" for="email">E-mail
                <p class="personal-main-info-individ-name">
                <input type="text" id="patronymic" class="personal-main-info-individ-name"
                    v-model="user.email">
                </p>
            </label>
            <label class="personal-main-info-individ-head" for="messengers">Мессенджеры
               <p class="personal-main-info-individ-name">
                <input type="text" id="patronymic" class="personal-main-info-individ-name"
                    v-model="user.messengers">
                </p>
            </label>
        </div>
    </div>
    <div class="personal-main-info-about">
        <label class="personal-main-info-about-head" for="about">О себе:
            <p>
                <textarea class="personal-main-info-about-name" id="about" v-model="user.about"
                placeholder="Расскажи о себе">
                </textarea>
            </p>
        </label>

    </div>
    <button href="#" class="personal-main-info-change personal-main-info-change-btn"
        @click="updateUserData(user)">
        Редактировать профиль
    </button>

</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  name: 'PersonalDataUser',

  // Компоненты которые подключаем к нашему данному файлу
  components: {

  },

  data() {
    return {
      optionSelected: null,
      optionsSelected: null,
      inputVal: '',
      messengers: [
        'viber',
        'WhatsApp',
        'Telegram',
      ],

    };
  },

  computed: {
    ...mapGetters(['user']),
  },
  methods: {
    ...mapActions(['updateUserDataRequest']),

    async updateUserData(user) {
      const result = await this.updateUserDataRequest(user);
      if (result) {
        alert('Профиль обновлен');
      }
    },

  },

};
</script>

<style>

</style>
