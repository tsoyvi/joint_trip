import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },

  // Ссылки в футоре
  {
    path: '/how_it_works',
    name: 'HowItWorks',
    component: () => import('../views/HowItWorks.vue'),
  },
  {
    path: '/terms_use',
    name: 'TermsUse',
    component: () => import('../views/TermsUse.vue'),
  },
  {
    path: '/about',
    name: 'about',
    component: () => import('../views/AboutView.vue'),
  },
  {
    path: '/write_to_us',
    name: 'write_to_us',
    component: () => import('../views/WriteToUs.vue'),
  },
  {
    path: '/results',
    name: 'results',
    component: () => import('../views/Results.vue'),
  },
  {
    path: '/add',
    name: 'add',
    component: () => import('../views/AddTrip.vue'),
  },

  // Ссылки на авторизацию / регистрацию
  {
    path: '/login_user',
    name: 'LoginUser',
    component: () => import('../views/auth/LoginUser.vue'),
  },

  {
    path: '/register_user',
    name: 'RegisterUser',
    component: () => import('../views/auth/RegisterUser.vue'),
  },

  // Ссылки личного кабинета
  {
    path: '/account_user',
    name: 'AccountUser',
    component: () => import('../views/auth/AccountUser.vue'),
  },
  {
    path: '/car_user',
    name: 'CarUser',
    component: () => import('../views/auth/AccountUser.vue'),
  },
  {
    path: '/trips_user',
    name: 'TripsUser',
    component: () => import('../views/auth/AccountUser.vue'),
  },
  {
    path: '/notice_user',
    name: 'NoticeUser',
    component: () => import('../views/auth/AccountUser.vue'),
  },

];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
