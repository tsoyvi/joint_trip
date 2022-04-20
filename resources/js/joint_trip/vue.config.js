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
    proxy: 'http://127.0.0.1:8001',
  },
};
