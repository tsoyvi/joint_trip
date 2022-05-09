<template>
  <form action="" method="post" @submit.prevent="goSearch">
            <div  class="form-input-box">
              <multiselect v-model="searchData.from"
                  placeholder="Откуда"
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

              <multiselect v-model="searchData.to"
                  placeholder="Куда"
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
                <Datepicker v-model="searchData.date" format="dd/MM/yy" :enableTimePicker="false" :minDate="new Date()" autoApply name="datetimes"></Datepicker>
              </div>
            </div>
            <hr class="search-form-delimeter" />
            <div class="form-people-box">
              <div>
                <svg
                  viewBox="0 0 19 20"
                  xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  aria-hidden="true"
                >
                  <g fill="none">
                    <path
                      d="M9.583 9.167a3.75 3.75 0 0 0 3.75-3.75v-.834a3.75 3.75 0 0 0-7.5 0v.834a3.75 3.75 0 0 0 3.75 3.75zm0 .833A4.584 4.584 0 0 1 5 5.417v-.834a4.584 4.584 0 0 1 9.167 0v.834A4.584 4.584 0 0 1 9.583 10zM18.333 17.007v1.743c0 .23-.186.417-.416.417H1.25a.417.417 0 0 1-.417-.417v-1.743a3.742 3.742 0 0 1 2.752-3.616c2.033-.554 4.08-.891 5.998-.891 1.92 0 3.966.337 5.998.891a3.742 3.742 0 0 1 2.752 3.616zm-.833 0a2.908 2.908 0 0 0-2.138-2.812c-1.967-.537-3.944-.862-5.779-.862-1.834 0-3.811.325-5.779.862a2.908 2.908 0 0 0-2.137 2.812v1.326H17.5v-1.326z"
                      fill="#708C91" ></path>
                  </g>
                </svg>
              </div>

               <select v-model="searchData.count_pass">
                    <option v-for="(item, index) of countPass"
                    :key=index
                    :value="item">{{ ('0'+item).slice(-2) }}
                    </option>
                </select>

            </div>
            <div class="form-submit-box">
              <button type="submit" @click="searchTripsRequest(searchData)">
                <span class="">Поиск</span>
              </button>
            </div>
          </form>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import Datepicker from '@vuepic/vue-datepicker';
import Multiselect from '@vueform/multiselect';

import { ref } from 'vue';

export default {
  name: 'searchBar',
  components: {
    Datepicker,
    Multiselect, // https://github.com/vueform/multiselect
  },
  data() {
    return {
      countPass: 10,
      selectorCityEn: null,
      searchData: {
        from: null,
        to: null,
        date: this.date,
        count_pass: 1,
      },

    };
  },

  setup() {
    const date = ref(new Date());
    return {
      date,
    };
  },

  computed: {
    ...mapGetters(['citiesList']),
  },

  methods: {
    ...mapActions(['searchTripsRequest']),
    // для дальнейшего исследования выпадающего списка
    test(query) {
      console.log(query);
    },

    goSearch(e) {
      e.preventDefault();
      // console.log(this.searchData);
      this.$router.push('/results');
    },

  },

};
</script>

<style src="@vuepic/vue-datepicker/dist/main.css"></style>
<style src="@vueform/multiselect/themes/default.css"></style>
