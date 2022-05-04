<template>
  <form action="" method="post">
           <!-- <label class="form-input-box" for="search-from">
                <input id="search-from" type="search" placeholder="Откуда" name="from" autocomplete="off"
                v-model="search.from" style=""
                @input ="selectCity({id: 'search-from' })"/>
            </label> -->

            <div  class="form-input-box">
              <multiselect v-model="search.from"
                  :close-on-select="true"
                  :searchable="true"
                  :create-option="true"
                  :options="citiesList"
                  @search-change="test"
              ></multiselect>
            </div>

            <hr class="search-form-delimeter" />
            <div class="form-input-box" for="search-to">
                <!-- <input id="search-to" type="search" placeholder="Куда" name="to" value=""/> -->

              <multiselect v-model="search.to"
                  :close-on-select="true"
                  :searchable="true"
                  :create-option="true"
                  :options="citiesList"
                  @search-change="test"
              ></multiselect>

            </div>
            <hr class="search-form-delimeter" />
            <div class="search-button-date-box">
              <div class="search-button-date-wrapper" for="calendar">
                <div>
                  <img src="images/cal_image.svg" alt="cal_image.svg">
                </div>
                <label for="calendar">
                  <input id="calendar" type="date" name="datetimes" v-model="search.date" class="search-button-date">
                </label>
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
</template>

<script>
import { mapGetters } from 'vuex';
import Multiselect from '@vueform/multiselect';
import DateMixin from '../mixins/date';

export default {
  name: 'searchBar',
  mixins: [DateMixin],
  components: {
    // https://github.com/vueform/multiselect
    Multiselect,
  },
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

  computed: {
    ...mapGetters(['citiesList']),
  },

  methods: {
    test(query) {
      console.log(query);
    },

  },

};
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
