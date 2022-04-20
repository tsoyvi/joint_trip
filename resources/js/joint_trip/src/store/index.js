import { createStore } from 'vuex';
import trips from './trips';
import auth from './auth';

export default createStore({
  modules: {
    auth,
    trips,

  },
});
