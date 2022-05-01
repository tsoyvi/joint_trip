<template>
    <div v-if="authStatus==='loading'" class="blur">
        <div class="blur-loaded">
            <i class="fa fa-2x fa-spin fa-refresh"></i>
        </div>
    </div>

    <h1 class="personal-main-info-header"
        v-bind:class="{ pouring: authStatus==='loading' }">Личные данные</h1>
    <div class="personal-main-info-data">
        <div class="personal-main-info-img">

            <div v-if="uploadFileSatatus !='loading'">
            <img v-if="user.image_link" class="personal-img"
                :src="'storage/' + user.image_link" alt="avatar">
            <img v-else class="personal-img"
                src="images/avatar-ico.png" alt="avatar">
            </div>
            <div v-else class="personal-img">
                <i class="fa fa-2x fa-spin fa-refresh"></i>
            </div>

            <div id="form-add-img" class="personal-add-img-form">
                <div id="file-upload" class="personal-add-img-form-block">
                    <label class="label" for="uploade-file">
                        <input type="file" name="file" id="uploade-file">
                        <div class="personal-add-img-form-file">Выберите файл</div>
                    </label>
                </div>
            </div>
            <div class="personal-add-img">
                <upload-file
                :buttonValue="'Загрузить фото'"
                :buttonClass="'personal-add-img-btn'"
                :url="urlUserPhoto"
                :id="user.id"
                ></upload-file>
            </div>
        </div>
        <div class="personal-main-info-individ">
            <label class="personal-main-info-individ-head" for="surname">Фамилия:
                <p class="personal-main-info-individ-name">
                <input type="text" id="surname" class="personal-main-info-individ-name-form"
                    v-model="user.surname">
                </p>
            </label>
            <label class="personal-main-info-individ-head" for="name">Имя:
                 <p class="personal-main-info-individ-name">
                <input type="text" id="name" class="personal-main-info-individ-name-form"
                    v-model="user.name">
                </p>
            </label>

            <label class="personal-main-info-individ-head" for="patronymic">Отчество:
               <p class="personal-main-info-individ-name">
                <input type="text" id="patronymic" class="personal-main-info-individ-name-form"
                    v-model="user.patronymic">
                </p>
            </label>

            <label class="personal-main-info-individ-head" for="birth_day">Возраст:
              <p class="personal-main-info-individ-name">
                <input type="text" id="birth_day" class="personal-main-info-individ-name-form"
                    v-model="user.birth_day">
              </p>
            </label>
        </div>
        <div class="personal-main-info-contact">
            <label class="personal-main-info-individ-head" for="city">Город
             <p class="personal-main-info-individ-name">
               <input type="text" id="city" class="personal-main-info-individ-name-form"
                    v-model="user.city">
            </p>
            </label>

            <label class="personal-main-info-individ-head" for="phone_number">Телефон
                <p class="personal-main-info-individ-name">
                <input type="text" id="phone_number" class="personal-main-info-individ-name-form"
                    v-model="user.phone_number">
                </p>
                </label>

            <label class="personal-main-info-individ-head" for="email">E-mail
                <p class="personal-main-info-individ-name">
                <input type="text" id="email" class="personal-main-info-individ-name-form"
                    v-model="user.email">
                </p>
            </label>
            <label class="personal-main-info-individ-head" for="messengers">Мессенджеры
               <p class="personal-main-info-individ-name">
                <input type="text" id="messengers" class="personal-main-info-individ-name-form"
                    v-model="user.messengers">
                </p>
            </label>
        </div>
    </div>
    <div class="personal-main-info-about">
        <label class="personal-main-info-about-head" for="about">
            <p class="personal-main-info-about-head-name">О себе:</p>
            <p class="personal-main-info-about-head-text">
                <textarea class="personal-main-info-about-name-form" id="about" v-model="user.about"
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
import UploadFile from '../blocks/UploadFile.vue';

export default {
  name: 'PersonalDataUser',

  // Компоненты которые подключаем к нашему данному файлу
  components: {
    UploadFile,
  },

  data() {
    return {
      messengers: [
        'viber',
        'WhatsApp',
        'Telegram',
      ],
      urlUserPhoto: '/api/upload_user_image',
    };
  },

  computed: {
    ...mapGetters(['user', 'authStatus', 'uploadFileSatatus']),
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
