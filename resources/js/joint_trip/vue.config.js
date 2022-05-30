/*
const { defineConfig } = require('@vue/cli-service');

module.exports = defineConfig({
  transpileDependencies: true,

  devServer: {
    proxy: 'http://localhost:9999',
  },

});
*/

module.exports = {
  devServer: {
    proxy: 'http://bla-bal.dv:80',
    // proxy: 'http://localhost:9999',
  },
};
