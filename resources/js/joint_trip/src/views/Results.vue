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
      <div class="container">
        <ul class="result-list">

          <li v-for="(foundTrip, index) in foundTrips" :key="index">
            <div class="result-card">
              <a href="#">
                <div class="result-card-top">
                  <div class="result-card-route">
                    <div class="result-card-halt">
                      <div style="font-size: 0.8em;">{{ formatDateToRus(foundTrip.date_depart) }}</div>
                      <div>{{foundTrip.from}}</div>
                    </div>
                    <div class="result-card-halt">
                      <div></div>
                      <div class="result-card-halt-delimeter">|</div>
                    </div>
                    <div class="result-card-halt">
                      <div style="font-size: 0.8em;">{{ formatDateToRus(foundTrip.date_arrival) }}</div>
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
                  <div class="driver-tickets">{{foundTrip.count_pass}} места</div>
                </div>
              </a>
            </div>
          </li>

        </ul>
      </div>
    </section>
    <button @click="searchTrips()"> Загрузить тест</button>
  </main>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import SearchBar from '../components/search/SearchBar.vue';
import DateMixin from '../mixins/date';

export default {
  name: 'ResuLts',
  components: {
    SearchBar,
  },
  mixins: [DateMixin],
  data() {
    return {

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
  },

};
</script>
