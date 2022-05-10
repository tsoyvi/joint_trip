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
      if (count === 1) {
        return `${count} место`;
      }
      if ((count > 1) && (count < 5)) {
        return `${count} места`;
      }
      if ((count > 4) && (count <= 10)) {
        return `${count} мест`;
      }
      return `${count} мест`;
    },
  },

};
