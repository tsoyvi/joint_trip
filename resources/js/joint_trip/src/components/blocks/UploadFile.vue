<template>
  <div :class="buttonClass" style="text-align:center; display: table">
      <label for="file" style="display: table-cell; vertical-align: middle;">{{buttonValue}}
        <input type="file" id="file" ref="file" accept=".jpg,.jpeg,.png"
         @change="handleFileUpload()"/>
      </label>
  </div>
</template>
<script>
import { mapActions } from 'vuex';

export default {
  name: 'UploadFile',
  props: ['url', 'buttonValue', 'buttonClass', 'id'],

  data() {
    return {
      file: '',
    };
  },
  methods: {
    ...mapActions(['submitUserFile']),

    handleFileUpload() {
      // eslint-disable-next-line prefer-destructuring
      this.file = this.$refs.file.files[0];

      const formData = new FormData();
      formData.append('image', this.file);
      formData.append('id', this.id);

      this.submitUserFile({ url: this.url, formData });
    },
  },
};
</script>

<style>

</style>
