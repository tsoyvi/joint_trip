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
            <p class="personal-main-info-individ-head">Фамилия:</p>
            <p class="personal-main-info-individ-name">{{user.name}}</p>
            <p class="personal-main-info-individ-head">Имя:</p>
            <p class="personal-main-info-individ-name">Иван</p>
            <p class="personal-main-info-individ-head">Отчество:</p>
            <p class="personal-main-info-individ-name">Иванович</p>
            <p class="personal-main-info-individ-head">Возраст:</p>
            <p class="personal-main-info-individ-name">30</p>
        </div>
        <div class="personal-main-info-contact">
            <p class="personal-main-info-individ-head">Город</p>
            <p class="personal-main-info-individ-name">Москва</p>
            <p class="personal-main-info-individ-head">Телефон</p>
            <p class="personal-main-info-individ-name">+7999999999</p>
            <p class="personal-main-info-individ-head">E-mail</p>
            <p class="personal-main-info-individ-name">{{user.email}}</p>
            <p class="personal-main-info-individ-head">Мессенджеры</p>
            <p class="personal-main-info-individ-name">WhatsApp</p>
        </div>
    </div>
    <div class="personal-main-info-about">
        <p class="personal-main-info-about-head">О себе:</p>
        <p class="personal-main-info-about-name">Рассказ о себе</p>
    </div>
    <a href="#" class="personal-main-info-change">
        <div class="personal-main-info-change-btn">Редактировать профиль</div>
    </a>

</template>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'PersonalDataUser',

  // Компоненты которые подключаем к нашему данному файлу
  components: {

  },

  computed: {
    ...mapGetters(['user']),
  },

};
</script>

<style>

</style>
