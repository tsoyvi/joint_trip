<template>
  <main class="main-content">
    <section class="personal">
      <div class="container">
        <div class="personal-header">
          <h1 class="personal-header-text">Личный кабинет</h1>
        </div>
      </div>
    </section>
    <section class="personal">
      <div class="container">
        <div class="personal-main">
          <div class="personal-main-menu">
            <ul class="personal-main-menu-list">
              <li class="personal-main-menu-link">
                <router-link to="/" class="btm-go-main">На Главную</router-link>
              </li>
              <li class="personal-main-menu-link">
                <router-link to="/account_user" class="btm-go-main">Личные данные</router-link>
              </li>
              <li class="personal-main-menu-link">
                <router-link to="/car_user" class="btm-go-main">Мой автомобиль</router-link>
              </li>
              <li class="personal-main-menu-link  active">
                <router-link to="/new_trip"
                            class="btm-go-main">Новая поездка</router-link>
              </li>
              <li class="personal-main-menu-link">
                <a href="#" class="btm-go-main">Уведомления</a>
              </li>
            </ul>
          </div>
          <div class="personal-main-info">
            <form method="post" action="index.html">
                      <p>
                        <label for="startingCity">
                        <input type="text" name="startingCity" placeholder="Начало поездки"
                         id="startingCity" v-model="trip.startingCity">
                          </label>
                      </p>
                      <p>
                        <label for="destination">
                        <input type="text" name="destination"  placeholder="Куда"
                         id="destination" v-model="trip.destination">
                        </label>
                      </p>
                      <p>
                        <label for="date">
                          <input type="text" name="date" id="date" placeholder="Дата"
                           v-model="trip.date">
                        </label>
                      </p>
                      <p class="login-submit">
                        <button  class="btn btn-primary" @click="handleSubmit"
                        >Опубликовать поездку</button>
                      </p>
                    </form>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
<script>

import { mapActions } from 'vuex';
// import ResultsRows from '../components/ResultsRows.vue';

export default {
  name: 'singleTrip',
  data() {
    return {
      trip: {
        startingCity: '',
        destination: '',
        date: '',
      },
    };
  },

  computed: {
    // Здесь причисляем методы (функции) которые отдают нам данные из хранилища (store)
    // ...mapGetters(['material', 'user']),
  },

  methods: {
    // Здесь причисляем методы (функции) которые будут вызываться нами в этом блоке.
    // Они хранятся в хранилище  (store)
    ...mapActions(['newTrip']),

    // Метод который вызывает нажатие кнопки
    handleSubmit(e) {
      e.preventDefault();
      // Простая валидация на заполненность полей
      if (this.trip.startingCity.length > 0 && this.trip.destination.length > 0) {
        this.newTrip(this.trip);
      }
    },
  },

  // Хука, которая вызывается при создании этой страницы
  // почитать можно https://v3.ru.vuejs.org/ru/api/options-lifecycle-hooks.html

};

</script>
