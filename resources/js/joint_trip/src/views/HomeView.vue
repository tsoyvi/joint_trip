<template>
  <main class="main-content">
    <section class="main-form">
      <div class="main-form-content">
        <h1 class="main-form-header">
          Поездки на ваш выбор по самым низким ценам
        </h1>
        <div class="main-form-box">
          <form action="" method="post">
            <label class="form-input-box" for="search-from">
                <input id="search-from" type="search" placeholder="Откуда" name="from" value="" />
            </label>
            <hr class="search-form-delimeter" />
            <div class="form-input-box" for="search-to">
                <input id="search-to" type="search" placeholder="Куда" name="to" value=""/>
            </div>
            <hr class="search-form-delimeter" />
            <div class="search-button-date-box">
              <div class="search-button-date-wrapper" for="calendar">
                <Datepicker v-model="date" format="dd/MM/yy" :enableTimePicker="false" :minDate="new Date()" autoApply name="datetimes"></Datepicker>
              </div>
            </div>
            <hr class="search-form-delimeter" />
            <div class="form-people-box">
              <div>
                <svg
                  viewBox="0 0 19 20"
                  xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  aria-hidden="true"
                >
                  <g fill="none">
                    <path
                      d="M9.583 9.167a3.75 3.75 0 0 0 3.75-3.75v-.834a3.75 3.75 0 0 0-7.5 0v.834a3.75 3.75 0 0 0 3.75 3.75zm0 .833A4.584 4.584 0 0 1 5 5.417v-.834a4.584 4.584 0 0 1 9.167 0v.834A4.584 4.584 0 0 1 9.583 10zM18.333 17.007v1.743c0 .23-.186.417-.416.417H1.25a.417.417 0 0 1-.417-.417v-1.743a3.742 3.742 0 0 1 2.752-3.616c2.033-.554 4.08-.891 5.998-.891 1.92 0 3.966.337 5.998.891a3.742 3.742 0 0 1 2.752 3.616zm-.833 0a2.908 2.908 0 0 0-2.138-2.812c-1.967-.537-3.944-.862-5.779-.862-1.834 0-3.811.325-5.779.862a2.908 2.908 0 0 0-2.137 2.812v1.326H17.5v-1.326z"
                      fill="#708C91" ></path>
                  </g>
                </svg>
              </div>
              <select class="" title="Количество бронируемых мест">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="1">04</option>
                <option value="2">05</option>
                <option value="3">06</option>
                <option value="1">07</option>
                <option value="2">08</option>
                <option value="3">09</option>
                <option value="3">10</option>
              </select>
            </div>
            <div class="form-submit-box">
              <button type="submit">
                <router-link to="/results"><span class="">Поиск</span></router-link>
              </button>
            </div>
          </form>
          <SearchBar/>
        </div>
      </div>
    </section>
    <section class="about">
      <div class="container">
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
      <div class="container">
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
import SearchBar from '../components/search/SearchBar.vue';

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { ref } from 'vue';

export default {
  name: 'HomeView',
  components: { Datepicker },
  data() {
    return {
      // date: null,
    };
  },
  setup() {
    const date = ref(new Date());
    return {
      date,
    };
  components: {
    SearchBar,
  },
};
</script>
