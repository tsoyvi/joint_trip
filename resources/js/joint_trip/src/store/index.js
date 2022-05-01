import { createStore } from 'vuex';
import auth from './auth';
import userUploadFiles from './userUploadFiles';

export default createStore({
  modules: {
    auth,
    userUploadFiles,

  },
});
