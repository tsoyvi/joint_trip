import { createStore } from 'vuex';
import auth from './auth';
import userUploadFiles from './userUploadFiles';
import errors from './blocks/errors';

export default createStore({
  modules: {
    auth,
    userUploadFiles,
    errors,

  },
});
