<template>
  <!-- Вертикально центрированное прокручиваемое модальное окно -->

<!-- Кнопка-триггер модального окна -->
<button type="button" data-bs-toggle="modal" data-bs-target="#endTripModalWindow"
  style="display: none;" id="openButtonEndTripModalWindow">
</button>

<!-- Модальное окно -->
<div ref="modal" class="modal fade" id="endTripModalWindow" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-body">
        <div v-if="trip" >
            <div>Отправление из {{trip.from}} дата / время: {{ formatDateTimeToRus(trip.date_depart) }}</div>
            <div>Прибытие в {{trip.to}} дата / время: {{ formatDateTimeToRus(trip.date_arrival) }}</div>
            <div>Стоимость места: {{trip.place_cost}} руб.</div>
            <hr>
             <div>Водитель:
                <img v-if="trip.user_driver.image_link" class="driver-img"
                    :src="'storage/' + trip.user_driver.image_link" alt="avatar">
                <img v-else class="driver-img" src="images/avatar-ico.png" alt="avatar">
                {{trip.user_driver.surname}} {{trip.user_driver.name}} {{trip.user_driver.patronymic}}
                <div>Рейтинг:
                    <span style="color: orange;">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half" aria-hidden="true"></i>
                    </span>
                </div>
            </div>

        </div>
        <div class="form-group">
            Комментарий
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
            @click="endTripPassenger()">Завершить</button>

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
  name: 'endTripModalWindow',
  props: ['titleModalWindow'],
  mixins: [DateMixin, PlaceDeclensionCase],
  components: {
  },
  data() {
    return {
      trip: null,
      // seat_reservation: null,
      // freePlaceCount: null,
    };
  },

  methods: {
    ...mapActions(['endTripPassenger']),

    initializingVar() {
      this.trip = null;
    },

    openWindow(trip) {
      this.initializingVar();

      const openButtonModal = document.getElementById('openButtonEndTripModalWindow');
      openButtonModal.click();
      console.log(trip);
      this.trip = trip;
      /// this.freePlaceCount = freePlaceCount;
    },

  },

};
</script>

<style>

</style>
