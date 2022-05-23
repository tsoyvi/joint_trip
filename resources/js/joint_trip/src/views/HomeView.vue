<template>
  <main class="main-content">
    <section class="main-form">
      <div class="main-form-content">
        <h1 class="main-form-header">
          Поездки на ваш выбор по самым низким ценам
        </h1>
        <div class="main-form-box">

          <SearchBar/>

        </div>
      </div>
    </section>
    <section class="about">
      <div class="container row">
        <div class="col-3">
          <div class="col-3-item">
            <img src="/images/importo-ico.png" alt="" />
            <h2>Импортозамещение во всем!</h2>
            <div>
              В современных условиях для Россиян лучше пользоваться нашими,
              русскими сервисами. Это гарантирует стабильность предоставляемых
              услуг и помогает нашей экономике стать сильнее.
            </div>
          </div>
          <div class="col-3-item">
            <img src="/images/rub-ico.png" alt="" />
            <h2>Поездки по самой низкой цене</h2>
            <div>
              Куда бы вы ни собирались, на автобусе или с попутчиками, вы
              сможете найти свою идеальную поездку среди множества маршрутов и
              доехать по самой низкой цене.
            </div>
          </div>
          <div class="col-3-item">
            <img src="/images/click-ico.png" alt="" />
            <h2>Всего пара кликов для поездка!</h2>
            <div>
              Найти и забронировать поездку очень просто. Наше приложение очень
              простое, а умный алгоритм за пару минут найдет водителя
              поблизости. Вам останется нажать пару кнопок для бронирования.
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="about">
      <div class="container row">
        <div class="col-2">
          <div class="col-2-item">
            <img src="/images/driver-passenger.jpg" alt="" />
          </div>
          <div class="col-2-item">
            <h2>Вы зарулем? Тогда экономьте!</h2>
            <div>
              Зарегистрируйтесь как водитель, берите попутчиков и экономьте на
              бензине. Потратьте всего пару минут и опубликуйте свою первую
              поездку. Вы готовы?
            </div>
            <div>
              <a href="#" class="main-btn">Зарегистироваться как водитель!</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
// @ is an alias to /src
// import { ref } from 'vue';

import '@vuepic/vue-datepicker/dist/main.css';

import SearchBar from '../components/search/SearchBar.vue';

export default {
  name: 'HomeView',
  components: {

    SearchBar,
  },
  data() {
    return {
      // date: null,
    };
  },
  setup() {
    // const date = ref(new Date());
    return {
      // date,
    };
  },
};
</script>
