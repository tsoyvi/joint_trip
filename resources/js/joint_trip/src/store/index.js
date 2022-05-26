import { createStore } from 'vuex';
import auth from './auth';
import userUploadFiles from './userUploadFiles';
import errors from './blocks/errors';
import cities from './blocks/cities';
import trips from './trips';
import messenger from './messenger';

export default createStore({
  modules: {
    auth,
    userUploadFiles,
    errors,
    cities,
    trips,
    messenger,

  },
});
