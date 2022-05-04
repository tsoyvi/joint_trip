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
                        <Datepicker v-model="addTrip.dateDepart"
                            format="dd/MM/yy H:m" :minDate="date"
                            autoApply placeholder="Дата отправления"
                            name="start-day">
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
                        <Datepicker v-model="addTrip.dateArriva"
                            format="dd/MM/yy H:m"
                            :minDate="addTrip.dateDepart"
                            autoApply placeholder="Дата прибытия"
                            name="end-date">
                        </Datepicker>
                    </div>

                    <div class="form-input"></div>

                    <div class="form-input">
                        <!-- <input type="nuber" placeholder="Количество мест" name="amount-seats" title="Количество мест " value=""> -->
                            <select v-model="addTrip.countPass" class="form-input-select">
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
                            v-model="addTrip.placeСost">
                    </div>
                    <label for="agreement" class="agreement">
                        <div>Добавляя поездку, я соглашаюсь с <a target="_blank" href="#">правлами</a></div>
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
    {{addTrip}}
</template>

<script>

import { mapGetters } from 'vuex';

import Datepicker from '@vuepic/vue-datepicker';
import { ref } from 'vue';
import Multiselect from '@vueform/multiselect';

export default {
  name: 'HomeView',
  components: {
    Datepicker,
    Multiselect, // https://github.com/vueform/multiselect
  },

  data() {
    return {
      countPass: 10,
      selectorCityEn: null,
      addTrip: {
        from: null,
        to: null,
        dateDepart: this.date, // дата-время отправления
        dateArrival: this.date, // дата-время прибытия
        countPass: 1,
        placeСost: null,
      },

    };
  },

  setup() {
    const date = ref();
    return {
      date,
    };
  },

  computed: {
    ...mapGetters(['citiesList']),
  },

  methods: {
    // для дальнейшего исследования выпадающего списка
    test(query) {
      console.log(query);
    },
    saveTrip(e) {
      e.preventDefault();
      alert('Действие -> сохранение в БД');
    },
  },

};
</script>

<style src="@vuepic/vue-datepicker/dist/main.css"></style>
<style src="@vueform/multiselect/themes/default.css"></style>
