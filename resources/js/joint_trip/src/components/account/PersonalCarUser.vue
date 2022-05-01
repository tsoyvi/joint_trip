<template>
    <div v-if="authStatus==='loading'" class="blur">
        <div class="blur-loaded">
            <i class="fa fa-2x fa-spin fa-refresh"></i>
        </div>
    </div>

  <h1 class="personal-main-info-header"
    v-bind:class="{ pouring: authStatus==='loading' }">Мой автомобиль</h1>
<div class="personal-car-info-data">
    <div class="personal-car-info-name">
        <label class="personal-main-info-individ-head" for="brand">Марка:
              <p class="personal-main-info-individ-name">
                <input type="text" id="brand" class="personal-main-info-individ-name-form"
                    v-model="userCar.brand">
              </p>
        </label>
        <label class="personal-main-info-individ-head" for="model">Модель:
              <p class="personal-main-info-individ-name">
                <input type="text" id="model" class="personal-main-info-individ-name-form"
                    v-model="userCar.model">
              </p>
        </label>

        <label class="personal-main-info-individ-head" for="body_type">Кузов:
            <p class="personal-main-info-individ-name">
              <input type="text" id="body_type" class="personal-main-info-individ-name-form"
                v-model="userCar.body_type">
            </p>
        </label>

        <label class="personal-main-info-individ-head" for="capacity">Количество посадочных мест:
            <p class="personal-main-info-individ-name">
              <input type="text" id="capacity" class="personal-main-info-individ-name-form"
                v-model="userCar.capacity">
            </p>
        </label>
    </div>
    <div class="personal-car-info-statis">
        <label class="personal-main-info-individ-head" for="engine_capacity">Объем двигателя:
            <p class="personal-main-info-individ-name">
              <input type="text" id="engine_capacity" class="personal-main-info-individ-name-form"
                v-model="userCar.engine_capacity">
            </p>
        </label>

        <label class="personal-main-info-individ-head" for="issue_year">Год выпуска:
            <p class="personal-main-info-individ-name">
              <input type="text" id="issue_year" class="personal-main-info-individ-name-form"
                v-model="userCar.issue_year">
            </p>
        </label>
        <label class="personal-main-info-individ-head" for="color">Цвет:
            <p class="personal-main-info-individ-name">
              <input type="text" id="color" class="personal-main-info-individ-name-form"
                v-model="userCar.color">
            </p>
        </label>
        <label class="personal-main-info-individ-head" for="state_number">Гос.номер:
            <p class="personal-main-info-individ-name">
              <input type="text" id="state_number" class="personal-main-info-individ-name-form"
                v-model="userCar.state_number">
            </p>
        </label>

    </div>
</div>
            <button class="personal-main-info-change personal-main-info-change-btn"
                @click="updateUserCar(userCar)">
                 Редактировать профиль
            </button>

<div class="personal-car-info-source">
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
              :buttonClass="'personal-add-img-btn'"
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
    ...mapGetters(['userCar', 'authStatus', 'uploadFileSatatus']),
  },
  methods: {
    ...mapActions(['updateUserCarRequest']),

    async updateUserCar(userCar) {
      console.log(userCar);
      const result = await this.updateUserCarRequest(userCar);
      if (result) {
        alert('Профиль обновлен');
      }
    },

  },

};
</script>

<style>

</style>
