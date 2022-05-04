<template>
  <div class="about">

    <h1>This is an about page</h1>
  </div>
  <div class="about">

    <h1>This is an about page</h1>
  </div>
    <div class="about">

    <h1>This is an about page</h1>
  </div>
    <div class="about">

    <h1>This is an about page</h1>
  </div>
    <div class="about">

    <h1>This is an about page</h1>
  </div>
    <div class="about">

    <h1>This is an about page</h1>
  </div>

<div>
<Multiselect
  v-model="value"
  :close-on-select="true"
  :searchable="true"
  :create-option="true"
  :options="citiesList"
  @search-change="test"
/>
{{ value }}<br>
{{citiesList}}

</div>

</template>

<script>
import { mapGetters } from 'vuex';
import Multiselect from '@vueform/multiselect';

export default {
  name: 'RegisterUser',
  components: {
    // https://github.com/vueform/multiselect
    Multiselect,
  },
  data() {
    return {
      value: null,
      options: this.citiesList,

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
