<template>
<div v-if="authStatus==='loading'" class="blur">
    <div class="blur-loaded">
        <i class="fa fa-2x fa-spin fa-refresh"></i>
    </div>
</div>

<div class="personal-car-info-data">
    <div class="personal-car-info-name">
      <label class="personal-main-info-individ-head" for="brand">Марка:
        <input type="text" id="brand" class="personal-main-info-individ-name-form"
            v-model="userCar.brand">
      </label>
      <label class="personal-main-info-individ-head" for="model">Модель:
        <input type="text" id="model" class="personal-main-info-individ-name-form"
            v-model="userCar.model">
      </label>

      <label class="personal-main-info-individ-head" for="body_type">Кузов:
        <input type="text" id="body_type" class="personal-main-info-individ-name-form"
          v-model="userCar.body_type">
      </label>

      <label class="personal-main-info-individ-head" for="capacity">Количество посадочных мест:
        <input type="text" id="capacity" class="personal-main-info-individ-name-form"
          v-model="userCar.capacity">
      </label>
    </div>
    <div class="personal-car-info-statis">
      <label class="personal-main-info-individ-head" for="engine_capacity">Объем двигателя:
        <input type="text" id="engine_capacity" class="personal-main-info-individ-name-form"
          v-model="userCar.engine_capacity">
      </label>

      <label class="personal-main-info-individ-head" for="issue_year">Год выпуска:
        <input type="text" id="issue_year" class="personal-main-info-individ-name-form"
          v-model="userCar.issue_year">
      </label>
      <label class="personal-main-info-individ-head" for="color">Цвет:
        <input type="text" id="color" class="personal-main-info-individ-name-form"
          v-model="userCar.color">
      </label>
      <label class="personal-main-info-individ-head" for="state_number">Гос.номер:
        <input type="text" id="state_number" class="personal-main-info-individ-name-form"
          v-model="userCar.state_number">
      </label>
    </div>
</div>
            <button class="personal-main-info-change personal-main-info-change-btn"
                @click="updateUserCar()">
                 Редактировать профиль
            </button>

<div class="personal-car-info-source" v-if="userCar.created_at">
    <div class="personal-car-info-source-img">
        <div v-if="uploadFileSatatus !='loading'" class="personal-car-info-source-img">
        <img v-if="userCar.image_link" class="car-img" :src="'storage/' +  userCar.image_link"
            alt="avatar">
        <img v-else class="car-img" src="images/avatar-ico.png" alt="avatar">
        </div>

        <div v-else class="personal-car-info-source-img">
          <div><i class="fa fa-2x fa-spin fa-refresh"></i></div>
        </div>
    </div>
    <div class="personal-car-info-source-load">
        <div class="car-add-img">
          <upload-file
              :buttonValue="'Загрузить фото'"
              :buttonClass="'personal-main-info-change-btn'"
              :url="urlUserPhoto"
              :id="userCar.id">
          </upload-file>
        </div>
    </div>
</div>

</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import UploadFile from '../blocks/UploadFile.vue';

export default {
  name: 'NoticeUser',
  components: {
    UploadFile,
  },
  data() {
    return {
      urlUserPhoto: '/api/upload_user_car_image',
    };
  },

  computed: {
    ...mapGetters(['user', 'userCar', 'authStatus', 'uploadFileSatatus']),
  },
  methods: {
    ...mapActions(['updateUserCarRequest']),

    async updateUserCar() {
      console.log(this.userCar);
      this.userCar.user_id = this.user.id;
      const result = await this.updateUserCarRequest(this.userCar);
      if (result) {
        alert('Профиль обновлен');
      }
    },

  },

};
</script>

<style>

</style>
