<template>

    <div v-if="userTrips.length !=0" style="width: 100%">

    <h1 class="personal-main-info-header">Текущие поездки как Водитель</h1>
    <!-- isset-drive -->

        <table class="table table-striped align-middle" v-for="(trip, index) in userTrips" :key="index">
          <thead>
            <tr align="center">
                <th>№</th>
                <th>Дата поездки</th>
                <th>Откуда</th>
                <th>Куда</th>
                <th>Стоимость</th>
                <th>Кол-во мест</th>
                <th>Забронировано мест</th>
            </tr>
          </thead>
          <tbody>
            <tr align="center">
                <td rowspan="2">{{index + 1 }} <br>
                  <div class="dropdown">
                    <button class="btn btn-link button-non-outline" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-tsoyvi" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Завершить</a></li>
                      <li><a class="dropdown-item" href="#">Отменить</a></li>
                    </ul>
                  </div>
                </td>

                <td>
                    {{ formatDateTimeToRus(trip.date_depart) }} <br>
                   | <br>{{ formatDateTimeToRus(trip.date_arrival) }}
                </td>
                <td> {{trip.from}}
                </td>
                <td>
                  {{trip.to}}
                </td>
                <td>{{trip.place_cost}}</td>
                <td>{{trip.count_pass}}</td>
                <td>
                    {{countPassengers(trip.user_passenger)}}
                </td>
            </tr>
            <tr class="table-success" align="center">
              <td colspan="6">
                <div v-for="(passenger, index) in trip.user_passenger" :key="index">
                  <div>{{passenger.surname }} {{passenger.name }} {{passenger.patronymic }}
                        - {{ placeDeclensionCase(passenger.pivot.place_count) }}
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>

    </div>
    <!--
    <div v-else class="personal-drive-empty">
        <h3 class="personal-drive-empty-text" id="drive-empty">Поездки не найдены</h3>
    </div>
    -->
          <!-- personal-drive-archive -->
        <div v-if="userTripsPassenger.length !=0" class="" style="width: 100%">
          <hr>
        <h1 class="personal-main-info-header">Текущие поездки как Пассажир</h1>

        <table class="table table-striped align-middle" v-for="(trip, index) in userTripsPassenger" :key="index">
            <thead>
              <tr class="personal-drive-archive-header" align="center">
                  <th>№</th>
                  <th>Дата поездки</th>
                  <th>Откуда</th>
                  <th>Куда</th>
                  <th>Стоимость</th>
                  <th>Забронировано мест</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
            <tr align="center">
                <td rowspan="2">
                  {{index + 1 }}<br>
                  <div class="dropdown">
                    <button class="btn btn-link button-non-outline" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-tsoyvi" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Завершить</a></li>
                      <li><a class="dropdown-item" href="#">Отменить</a></li>
                    </ul>
                  </div>
                </td>
                <td>
                  {{ formatDateTimeToRus(trip.date_depart) }}
                  <br>|<br>
                  {{ formatDateTimeToRus(trip.date_arrival) }}
                </td>

                <td>{{trip.from}}</td>
                <td>{{trip.to}}</td>
                <td>{{trip.place_cost}}</td>
                <td>{{trip.pivot.place_count}}</td>
                <td>
                 <!-- <div v-for="(passenger, index) in trip.user_passenger" :key="index">
                  <div>{{passenger.surname }} {{passenger.name }} {{passenger.patronymic }} - {{ passenger.pivot.place_count }} </div>
                  </div> -->
                </td>
            </tr>

            <tr class="table-success" align="center">
              <td colspan="6">

                  <div>Водитель {{trip.user_driver.surname }} {{trip.user_driver.name }} {{trip.user_driver.patronymic }}

                </div>
              </td>
            </tr>

           </tbody>
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
import DateMixin from '../../mixins/date';
import PlaceDeclensionCase from '../../mixins/placeDeclension';

export default {
  name: 'TripsUser',
  mixins: [DateMixin, PlaceDeclensionCase],
  data() {
    return {

    };
  },
  computed: {
    ...mapGetters(['userTrips', 'userTripsPassenger']),
  },
  methods: {
    ...mapActions(['userTripsRequest']),

    countPassengers(passengers) {
      // Здесь подсчитываем общее количество мест
      let countPassengers = 0;
      passengers.forEach((passenger) => {
        countPassengers += passenger.pivot.place_count;
      });
      return countPassengers;
    },

  },
  mounted() {
    this.userTripsRequest();
  },

};

</script>

<style>

</style>
