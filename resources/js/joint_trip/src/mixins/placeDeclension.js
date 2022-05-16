export default {
  methods: {
    /**
       * Склонение в родительсикй падеж количества мест
       * !! пока набросок до 10 мест !!
       *
       * @param {*} count - Количество мест
       * @returns количество мест в Р падеже
       */
    placeDeclensionCase(count) {
      return `${count} ${this.placeDeclensionCaseWord(count)}`;
    },

    placeDeclensionCaseWord(count) {
      if (count === 1) {
        return 'место';
      }
      if ((count > 1) && (count < 5)) {
        return 'места';
      }
      if ((count > 4) && (count <= 10)) {
        return 'мест';
      }
      return 'мест';
    },
  },

};
