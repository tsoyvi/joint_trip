export default {
  methods: {
    formatDateToRus(date) {
      if (date !== null) {
        return `${date.replace(/(\d+).(\d+).(\d+)/, '$3-$2-$1 г.')}`;
      }
      return '';
    },

    formatDateTimeToRus(date) {
      if (date !== null && date !== undefined) {
        return `${date.replace(/(\d+).(\d+).(\d+).(\d+).(\d+).(\d+)/, '$3-$2-$1 г. $4:$5')}`;
      }
      return '';
    },

    getDate() {
      return new Date().toLocaleDateString().replace(/(\d+).(\d+).(\d+)/, '$3-$2-$1');
    },

    getDateTime() {
      // return new Date().toLocaleDateString();
      return new Date().toISOString();
    },

    formatToMysql(date) {
      let d = new Date(date);
      d = d.toISOString().slice(0, 19).replace('T', ' ');
      console.log(d);
      return d;
    },

  },
};
