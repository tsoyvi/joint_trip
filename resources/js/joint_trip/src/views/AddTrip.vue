<template>
    <main class="main-content">
        <div class="container">
            <form class="add-trip-form" method="post" @submit.prevent="saveTrip">
                <div class="form-row">
                    <h1 class="form-header">Добавить поездку</h1>

                    <div class="form-input">
                        <!-- <input type="text" placeholder="Адрес отправления" name="start-address" title="Адрес отправления " value=""> -->
                        <multiselect v-model="addTrip.from"
                            placeholder="Адрес отправления"
                            title="Адрес отправления"
                            :close-on-select="true"
                            :searchable="true"
                            :create-option="true"
                            :options="citiesList"
                            @search-change="test"
                        ></multiselect>
                    </div>

                    <div class="form-input">
                        <Datepicker v-model="addTrip.date_depart"
                            format="dd/MM/yy H:m"
                            :minDate="this.getDateTime()"
                            autoApply placeholder="Дата отправления"
                            name="start-day"
                            >
                        </Datepicker>
                    </div>

                    <div class="form-input"></div>

                    <div class="form-input">
                        <!-- <input type="text" placeholder="Адрес прибытия" name="end-address" title="Адрес прибытия " value=""> -->
                        <multiselect v-model="addTrip.to"
                            placeholder="Адрес прибытия"
                            title="Адрес прибытия"
                            :close-on-select="true"
                            :searchable="true"
                            :create-option="true"
                            :options="citiesList"
                            @search-change="test"
                        ></multiselect>
                    </div>

                    <div class="form-input">
                        <Datepicker v-model="addTrip.date_arrival"
                            format="dd/MM/yy H:m"
                            :minDate="addTrip.date_depart"
                            autoApply placeholder="Дата прибытия"
                            name="end-date">
                        </Datepicker>
                    </div>

                    <div class="form-input"></div>

                    <div class="form-input">

                        <select v-model="addTrip.count_pass" class="form-input-select"
                            v-bind:class="{ 'amount-seats-select': !addTrip.count_pass }">
                            <option disabled value="">Количество мест</option>
                            <option v-for="(item, index) of countPass"
                            :key=index
                            :value="item">{{ ('0'+item).slice(-2) }}
                            </option>
                        </select>
                    </div>

                    <div class="form-input">
                        <input type="number" placeholder="Стоимость места"
                            name="price" title="Стоимость места"
                            min="0"
                            step="10"
                            v-model="addTrip.place_cost">
                    </div>
                    <label for="agreement" class="agreement">
                        <div>Добавляя поездку, я соглашаюсь с <a target="_blank" href="#">правилами</a></div>
                        <input id="agreement" type="checkbox" name="accept" checked="">
                    </label>
                    <div class="form-btn-wrapper" >
                        <button class="form-btn" type="submit">
                            <div class="button-label">Добавить поездку!</div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>

<script>

import { mapActions, mapGetters } from 'vuex';

import Datepicker from '@vuepic/vue-datepicker';

import Multiselect from '@vueform/multiselect';
import DateMixin from '../mixins/date';

export default {
  name: 'HomeView',
  components: {
    Datepicker,
    Multiselect, // https://github.com/vueform/multiselect
  },
  mixins: [DateMixin],
  data() {
    return {
      countPass: 10,
      selectorCityEn: null,
      addTrip: {
        from: null,
        to: null,
        date_depart: null, // дата-время отправления
        date_arrival: null, // дата-время прибытия
        count_pass: '',
        place_cost: null,
      },

    };
  },

  computed: {
    ...mapGetters(['citiesList']),
  },

  methods: {
    ...mapActions(['addTripRequest']),
    // для дальнейшего исследования выпадающего списка
    test(query) {
      console.log(query);
    },
    async saveTrip(e) {
      // Сбрасываем событие отправка формы на сервер
      // нам это не нужно бы работаем через JS
      e.preventDefault();

      // alert('Действие -> сохранение в БД');

      // Костыль по переводу даты и времени из формата toISOString в формат БД
      this.addTrip.date_depart = this.formatToMysql(this.addTrip.date_depart);
      this.addTrip.date_arrival = this.formatToMysql(this.addTrip.date_arrival);

      // отправляем в хранилище запрос на отправку данных на сервер
      const result = await this.addTripRequest(this.addTrip);

      // если все норм, открываем страницу пользователя с поездками
      if (result) {
        this.$router.push('/trips_user');
      }
    },
  },

};
</script>

<style src="@vuepic/vue-datepicker/dist/main.css"></style>
<style src="@vueform/multiselect/themes/default.css"></style>

<style>
.amount-seats-select{
    color: gray;
}
</style>
