<template>
  <form action="" method="post">
            <label class="form-input-box" for="search-from">
                <input id="search-from" type="search" placeholder="Откуда" name="from" autocomplete="off"
                v-model="search.from" style=""
                @input ="selectCity({id: 'search-from' })"/>
            </label>

            <hr class="search-form-delimeter" />
            <div class="form-input-box" for="search-to">
                <input id="search-to" type="search" placeholder="Куда" name="to" value=""/>
            </div>
            <hr class="search-form-delimeter" />
            <div class="search-button-date-box">
              <div class="search-button-date-wrapper" for="calendar">
                <div>
                  <img src="images/cal_image.svg" alt="cal_image.svg">
                </div>
                  <input id="calendar" type="date" name="datetimes" v-model="search.date" class="search-button-date">
              </div>
            </div>
            <hr class="search-form-delimeter" />
            <div class="form-people-box">
              <div>
                <img src="images/man_image.svg" alt="man_image.svg">
              </div>

               <select v-model="search.countPass">
                    <option v-for="(item, index) of countPass"
                    :key=index
                    :value="item">{{('0'+item).slice(-2) }}
                    </option>
                </select>

            </div>
            <div class="form-submit-box">
              <button type="submit">
                <span class="">Поиск</span>
              </button>
            </div>
          </form>

<div id="div-select-city" class="div-select-city">
    <ul>
        <li>Microsoft</li>
        <li>Google</li>
        <li>Apple</li>
        <li>IBM</li>
    </ul>
</div>

</template>

<script>
import DateMixin from '../mixins/date';

export default {
  name: 'searchBar',
  mixins: [DateMixin],
  data() {
    return {
      countPass: 10,
      selectorCityEn: null,
      search: {
        from: null,
        to: null,
        date: this.getDate(),
        countPass: 1,
      },
    };
  },
  methods: {
    selectCity(data) {
      console.log(data);
      const position = this.getPositionElement(data.id);
      this.setPositionElement('div-select-city', position);
      console.log(document.getElementById(data.id).style.width);
    },

    getPositionElement(idObjTarget) {
    // На данный момент не знаю как лучше сделать. Приходиться привязываться к id объекта
      const coordinates = document.getElementById(idObjTarget).getBoundingClientRect();

      const scrollTop = (window.pageYOffset || document.documentElement.scrollTop
              || document.body.scrollTop || 0) + coordinates.top;
      const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft
              || document.body.scrollLeft || 0 + coordinates.left;

      return { scrollTop, scrollLeft, coordinates };
    },

    // *
    // * @param {*} idObjTarget - id элемента который будем двигать
    // * @param {*} position - объект включающий scrollTop, scrollLeft, coordinates
    // */
    setPositionElement(idObjTarget, position) {
      const objTarget = document.getElementById(idObjTarget);

      objTarget.style.top = `${position.scrollTop + position.coordinates.height + 2}px`;
      objTarget.style.left = `${position.scrollLeft}px`;
    },

    /*
    setWidthElement(idObjTarget, id) {
      const objTarget = document.getElementById(idObjTarget);

    },
    */

  },

};
</script>

<style>

</style>
