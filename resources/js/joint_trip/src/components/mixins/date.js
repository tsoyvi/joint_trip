export default {
  methods: {
    formatDateToRus(date) {
      if (date !== null) {
        return `${date.replace(/(\d+).(\d+).(\d+)/, '$3.$2.$1')} г.`;
      }
      return '';
    },

    getDate() {
      return new Date().toLocaleDateString().replace(/(\d+).(\d+).(\d+)/, '$3-$2-$1');
    },

  },
};
