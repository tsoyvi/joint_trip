<template>
  <h1 class="personal-main-info-header">Мой автомобиль</h1>
<div class="personal-car-info-data">
    <div class="personal-car-info-name">
        <label class="personal-main-info-individ-head" for="brand">Марка:
              <p class="personal-main-info-individ-name">
                <input type="text" id="brand" class="personal-main-info-individ-name"
                    v-model="userCar.brand">
              </p>
        </label>
        <label class="personal-main-info-individ-head" for="model">Модель:
              <p class="personal-main-info-individ-name">
                <input type="text" id="model" class="personal-main-info-individ-name"
                    v-model="userCar.model">
              </p>
        </label>

        <label class="personal-main-info-individ-head" for="body_type">Кузов:
            <p class="personal-main-info-individ-name">
              <input type="text" id="body_type" class="personal-main-info-individ-name"
                v-model="userCar.body_type">
            </p>
        </label>

        <label class="personal-main-info-individ-head" for="capacity">Количество посадочных мест:
            <p class="personal-main-info-individ-name">
              <input type="text" id="capacity" class="personal-main-info-individ-name"
                v-model="userCar.capacity">
            </p>
        </label>
    </div>
    <div class="personal-car-info-statis">
        <label class="personal-main-info-individ-head" for="engine_capacity">Объем двигателя:
            <p class="personal-main-info-individ-name">
              <input type="text" id="engine_capacity" class="personal-main-info-individ-name"
                v-model="userCar.engine_capacity">
            </p>
        </label>

        <label class="personal-main-info-individ-head" for="issue_year">Год выпуска:
            <p class="personal-main-info-individ-name">
              <input type="text" id="issue_year" class="personal-main-info-individ-name"
                v-model="userCar.issue_year">
            </p>
        </label>
        <label class="personal-main-info-individ-head" for="color">Цвет:
            <p class="personal-main-info-individ-name">
              <input type="text" id="color" class="personal-main-info-individ-name"
                v-model="userCar.color">
            </p>
        </label>
        <label class="personal-main-info-individ-head" for="state_number">Гос.номер:
            <p class="personal-main-info-individ-name">
              <input type="text" id="state_number" class="personal-main-info-individ-name"
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
        <img class="car-img" src="images/car-ico.png" alt="#">
    </div>
    <div class="personal-car-info-source-load">
        <div id="form-add-img-car" class="car-add-img-form">
            <div id="file-upload" class="car-add-img-form-block">
                <label class="label" for="uploade-file">
                    <input type="file" name="file" id="uploade-file">
                    <div class="personal-add-img-form-file">Выберите файл</div>
                </label>
            </div>

        </div>
        <div class="car-add-img">
            <button id="btn-add-img-car" class="personal-add-img-btn">Загрузить фото
            </button>
        </div>
    </div>
</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
  name: 'NoticeUser',

  computed: {
    ...mapGetters(['userCar']),
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
