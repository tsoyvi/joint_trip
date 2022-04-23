<template>
  <h1 class="personal-main-info-header">Мой автомобиль</h1>
<div class="personal-car-info-data">
    <div class="personal-car-info-name">
        <p class="personal-main-info-individ-head">Марка:</p>
        <p class="personal-main-info-individ-name">БМВ</p>
        <p class="personal-main-info-individ-head">Модель:</p>
        <p class="personal-main-info-individ-name">5</p>
        <p class="personal-main-info-individ-head">Кузов:</p>
        <p class="personal-main-info-individ-name">Седан</p>
        <p class="personal-main-info-individ-head">
            Количество посадочных мест:</p>
        <p class="personal-main-info-individ-name">5</p>
    </div>
    <div class="personal-car-info-statis">
        <p class="personal-main-info-individ-head">Объем двигателя:</p>
        <p class="personal-main-info-individ-name">2.0</p>
        <p class="personal-main-info-individ-head">Год выпуска:</p>
        <p class="personal-main-info-individ-name">2020</p>
        <p class="personal-main-info-individ-head">Цвет:</p>
        <p class="personal-main-info-individ-name">Чёрный</p>
        <p class="personal-main-info-individ-head">Гос.номер:</p>
        <p class="personal-main-info-individ-name">а911мр999</p>

    </div>
</div>
<a href="#" class="personal-main-info-change">
    <div class="personal-main-info-change-btn">Редактировать профиль</div>
</a>
<div class="personal-car-info-source">
    <div class="personal-car-info-source-img">
        <img class="car-img" src="images/car-ico.png" alt="#">
    </div>
    <div class="personal-car-info-source-load">
        <form enctype="multipart/form-data" method="post"
        id="form-add-img-car" class="car-add-img-form">
            <div id="file-upload" class="car-add-img-form-block">
                <label class="label" for="uploade-file">
                    <input type="file" name="file" id="uploade-file">
                    <div class="personal-add-img-form-file">Выберите файл</div>
                </label>
            </div>
            <div class="personal-add-img-form-block">
                <input type="submit" class="personal-add-img-btn-form" value="Загрузить фото">
            </div>

        </form>
        <div class="car-add-img">
            <button id="btn-add-img-car" class="personal-add-img-btn">Загрузить фото
            </button>
        </div>
    </div>
</div>
</template>

<script>
export default {
  name: 'NoticeUser',

};
</script>

<style>

</style>
