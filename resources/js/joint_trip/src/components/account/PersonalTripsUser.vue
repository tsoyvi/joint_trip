<template>
    <h1 class="personal-main-info-header">Текущие поездки как Водитель</h1>
    <!-- isset-drive -->
    <div v-if="userTrips.length !=0">
        <table class="table table-striped">
          <thead>
            <tr>
                <th>№</th>
                <th>Дата поездки</th>
                <th>Откуда</th>
                <th>Куда</th>
                <th>Стоимость</th>
                <th>Кол-во мест</th>
                <th>Список пассажиров - мест</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(trip, index) in userTrips" :key="index">
                <td>{{index + 1 }}</td>
                <td>{{trip.date_depart}} - <br> {{trip.date_arrival}}</td>
                <td>{{trip.from}}</td>
                <td>{{trip.to}}</td>
                <td>{{trip.place_cost}}</td>
                <td>{{trip.count_pass}}</td>
                <td>
                  <div v-for="(passenger, index) in trip.user_passenger" :key="index">
                  <div>{{passenger.surname }} {{passenger.name }} {{passenger.patronymic }} - {{ passenger.pivot.place_count }} </div>
                  </div>

                </td>
            </tr>
          </tbody>
        </table>
    </div>
    <div v-else class="personal-drive-empty">
        <h3 class="personal-drive-empty-text" id="drive-empty">Поездки не найдены</h3>
    </div>
    <h1 class="personal-main-info-header">Текущие поездки как Пассажир</h1>

        <div v-if="userTripsPassenger.length !=0" class="personal-drive-archive" >
        <table>
            <tr class="personal-drive-archive-header">
                <th>№</th>
                <th>Дата поездки</th>
                <th>Откуда</th>
                <th>Куда</th>
                <th>Стоимость</th>
                <th>Забронировано мест</th>
                <th></th>
            </tr>
            <tr v-for="(trip, index) in userTripsPassenger" :key="index" class="personal-drive-archive-text">
                <td>{{index + 1 }}</td>
                <td>{{trip.date_depart}} - <br> {{trip.date_arrival}}</td>
                <td>{{trip.from}}</td>
                <td>{{trip.to}}</td>
                <td>{{trip.place_cost}}</td>
                <td>{{trip.pivot.place_count}}</td>
                <td>
                  <div v-for="(passenger, index) in trip.user_passenger" :key="index">
                  <div>{{passenger.surname }} {{passenger.name }} {{passenger.patronymic }} - {{ passenger.pivot.place_count }} </div>
                  </div>

                </td>
            </tr>
        </table>
    </div>

    <h1 class="personal-main-info-header">Архив</h1>
    <div class="personal-drive-archive isset-drive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>№</th>
              <th>Дата поездки</th>
              <th>Откуда</th>
              <th>Куда</th>
              <th>Водитель</th>
              <th>Автомобиль</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>11.11.2011</td>
              <td>Москва</td>
              <td>Санкт-Петербург</td>
              <td><a class="personal-drive-archive-driver" href="#">Иванов Иван</a></td>
              <td>БМВ 5</td>
            </tr>
          </tbody>
        </table>
    </div>
    <div class="personal-drive-empty isset-drive">
        <h2 class="personal-drive-empty-text" id="drive-empty">Поездки не найдены</h2>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

export default {
  name: 'TripsUser',
  data() {
    return {

    };
  },
  computed: {
    ...mapGetters(['userTrips', 'userTripsPassenger']),
  },
  methods: {
    ...mapActions(['userTripsRequest']),

    /* getTrips() {
      this.userTripsRequest();
    }, */

  },
  mounted() {
    this.userTripsRequest();
  },

};

</script>

<style>

</style>
