<template>
    <main class="main-content">
        <div class="container">
            <form class="add-trip-form" method="post">
                <div class="form-row">
                    <h1 class="form-header">Добавить поездку</h1>
                    <div class="form-input">
                        <input type="text" placeholder="Адрес отправления" name="start-address" title="Адрес отправления " value="">
                    </div>
                    <div class="form-input">
                        <Datepicker v-model="date" format="dd/MM/yy H:m" :minDate="new Date()" autoApply placeholder="Дата отправления" name="start-day"></Datepicker>
                    </div>
                    <div class="form-input"></div>
                    <div class="form-input">
                        <input type="text" placeholder="Адрес прибытия" name="end-address" title="Адрес прибытия " value="">
                    </div>
                    <div class="form-input">
                        <Datepicker v-model="date2" format="dd/MM/yy H:m" :minDate="new Date()" autoApply placeholder="Дата прибытия" name="end-date"></Datepicker>
                    </div>
                    <div class="form-input"></div>
                    <div class="form-input">
                        <input type="nuber" placeholder="Количество мест" name="amount-seats" title="Количество мест " value="">
                    </div>
                    <div class="form-input">
                        <input type="nuber" placeholder="Стоимость мста" name="price" title="Стоимость мста " value="">
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
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '../components/HelloWorld.vue';

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { ref } from 'vue';

export default {
  name: 'HomeView',
  components: { Datepicker },
  setup() {
    const date = ref();
    const date2 = ref();
    return {
      date,
      date2,
    };
  },
};
</script>
