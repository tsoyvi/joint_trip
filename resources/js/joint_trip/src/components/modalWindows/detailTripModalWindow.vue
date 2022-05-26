<template>
  <!-- Вертикально центрированное прокручиваемое модальное окно -->

<!-- Кнопка-триггер модального окна -->
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
  style="display: none;" id="openButtonModal">
</button>

<!-- Модальное окно -->
<div ref="modal" class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{titleModalWindow}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <div v-if="foundTrip" >
          <div>Отправление из {{foundTrip.from}} дата / время: {{ formatDateTimeToRus(foundTrip.date_depart) }}</div>
          <div>Прибытие в {{foundTrip.to}} дата / время: {{ formatDateTimeToRus(foundTrip.date_arrival) }}</div>
          <div>Стоимость места: {{foundTrip.place_cost}} руб.</div>
          <hr>
          <div>Водитель:
            <img v-if="foundTrip.user_driver.image_link" class="driver-img"
              :src="'storage/' + foundTrip.user_driver.image_link" alt="avatar">
            <img v-else class="driver-img" src="images/avatar-ico.png" alt="avatar">
            {{foundTrip.user_driver.surname}} {{foundTrip.user_driver.name}} {{foundTrip.user_driver.patronymic}}
              <div>Рейтинг:
                <span style="color: orange;">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-half" aria-hidden="true"></i>
                </span>
              </div>
            <hr>
            <div>
              Автомобиль:
              <img v-if="foundTrip.user_car.image_link" class="driver-img"
                :src="'storage/' + foundTrip.user_car.image_link" alt="car">

              <span>{{foundTrip.user_car.color}} {{foundTrip.user_car.brand}} {{foundTrip.user_car.model}}</span>
            </div>
          </div>
          <div>Количество свободных мест: {{ freePlaceCount }}</div>
          <hr>
          <div>Забронировать:
             <select v-model="seat_reservation">
                <option v-for="(item, index) of freePlaceCount"
                  :key=index
                  :value="item">{{ ('0'+item).slice(-2) }}
                </option>
              </select>
             {{placeDeclensionCaseWord(foundTrip.seat_reservation)}}
          </div>
          <div>Итого стоимость проезда:
             {{ seat_reservation * foundTrip.place_cost }} руб.
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
          :disabled="!seat_reservation"
          @click="seatReservation()"
          >Забронировать</button>

      </div>
    </div>
  </div>
</div>
</template>

<script>
import { mapActions } from 'vuex';
import DateMixin from '../../mixins/date';
import PlaceDeclensionCase from '../../mixins/placeDeclension';

export default {
  name: 'modalWindow',
  props: ['titleModalWindow'],
  mixins: [DateMixin, PlaceDeclensionCase],
  components: {
  },
  data() {
    return {
      foundTrip: null,
      seat_reservation: null,
      freePlaceCount: null,
    };
  },

  methods: {
    ...mapActions(['reservationSeatRequest']),

    initializingVar() {
      this.foundTrip = null;
      this.seat_reservation = null;
    },

    openWindow(foundTrip, freePlaceCount) {
      this.initializingVar();
      const openButtonModal = document.getElementById('openButtonModal');
      openButtonModal.click();
      console.log(foundTrip);
      this.foundTrip = foundTrip;
      this.freePlaceCount = freePlaceCount;
    },

    seatReservation() {
      console.log('Действие на бронирование места');
      this.foundTrip.seat_reservation = this.seat_reservation;

      this.reservationSeatRequest(this.foundTrip);
    },

  },

};
</script>

<style>

</style>
