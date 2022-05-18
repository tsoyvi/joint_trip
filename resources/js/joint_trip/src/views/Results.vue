<template>
  <main class="main-content">
    <section class="main-form results">

      <div class="main-form-content">

        <div class="main-form-box results">
          <SearchBar/>
        </div>

      </div>
    </section>
    <section class="results-section">
      <div v-if="foundTrips" class="container">
        <ul class="result-list">
          <li v-for="(foundTrip, index) in foundTrips" :key="index">
            <div class="result-card">

              <div  @click="viewDetails(foundTrip)" @keydown="bar" style="cursor:pointer;">

                <div class="result-card-top">
                  <div class="result-card-route">
                    <div class="result-card-halt">
                      <div style="font-size: 0.8em;">{{ formatDateTimeToRus(foundTrip.date_depart) }}</div>
                      <div>{{foundTrip.from}}</div>
                    </div>
                    <div class="result-card-halt">
                      <div></div>
                      <div class="result-card-halt-delimeter">|</div>
                    </div>
                    <div class="result-card-halt">
                      <div style="font-size: 0.8em;">{{ formatDateTimeToRus(foundTrip.date_arrival) }}</div>
                      <div>{{foundTrip.to}}</div>
                    </div>
                  </div>
                  <div>{{foundTrip.place_cost}} руб</div>
                </div>
                <div class="result-card-bottom">
                  <div class="result-card-driver">
                    <div>

                     <img v-if="foundTrip.user_driver.image_link" class="driver-img"
                        :src="'storage/' + foundTrip.user_driver.image_link" alt="avatar">
                     <img v-else class="driver-img" src="images/avatar-ico.png" alt="avatar">

                    </div>
                    <div class="driver-name">{{foundTrip.user_driver.surname}} {{foundTrip.user_driver.name}} {{foundTrip.user_driver.patronymic}} </div>
                  </div>
                  <!-- <div class="driver-tickets">{{ placeDeclensionCase(foundTrip.count_pass) }}</div> -->
                  <div class="driver-tickets">{{ freePlaceCount(foundTrip) }} из {{ placeDeclensionCase(foundTrip.count_pass)}}</div>
                </div>
              </div>
            </div>
          </li>
        </ul>

        <modal-window
          ref="modalWindow"
          :titleModalWindow="'Подробно о поездке'"
        ></modal-window>
      </div>

      <div v-else class="container">
        Ничего не найдено
      </div>

<!-- <button @click="$refs.modalWindow.openWindow()">ТЕСТ</button> -->
    </section>
  </main>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import SearchBar from '../components/search/SearchBar.vue';
import ModalWindow from '../components/modalWindows/detailTripModalWindow.vue';

import DateMixin from '../mixins/date';
import PlaceDeclensionCase from '../mixins/placeDeclension';

export default {
  name: 'ResuLts',
  components: {
    SearchBar,
    ModalWindow,
  },
  mixins: [DateMixin, PlaceDeclensionCase],
  data() {
    return {
      show: false,

    };
  },
  computed: {
    ...mapGetters(['foundTrips']),
  },
  methods: {
    ...mapActions(['searchTripsRequest']),

    searchTrips() {
      this.searchTripsRequest();
    },

    freePlaceCount(foundTrip) {
      let countBlockPlace = 0;
      if (foundTrip.user_passenger.length !== 0) { // проверяем есть ли пассажиры
        foundTrip.user_passenger.forEach((el) => { // если есть то перебираем их и смотрим сколько
          countBlockPlace += el.pivot.place_count; // они забронировали мест
        });
      }
      return foundTrip.count_pass - countBlockPlace;
    },

    viewDetails(foundTrip) {
      const freePlaceCount = this.freePlaceCount(foundTrip);
      this.$refs.modalWindow.openWindow(foundTrip, freePlaceCount);
    },

  },

};
</script>
