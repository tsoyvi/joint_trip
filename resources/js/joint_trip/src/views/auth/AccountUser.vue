<template>
  <main class="main-content">
    <section class="personal">
        <div class="container">
            <div class="personal-header">
                <h1 class="personal-header-text">Личный кабинет</h1>
            </div>
        </div>
    </section>
    <section class="personal">
        <div class="container">
            <div class="personal-main">

            <!-- Подгружаем наше боковое меню -->
                <personal-aside-menu-list />

            <!-- Подгружаем контент в зависимости от того, что в адресной строке -->
                <div v-if="$route.path == '/account_user'" class="personal-main-info">
                    <personal-data-user/>
                </div>

                <div v-if="$route.path == '/car_user'" class="personal-main-info">
                    <personal-car-user/>
                </div>

                <div v-if="$route.path == '/trips_user'" class="personal-main-info">
                    <personal-trips-user/>
                </div>

                <div v-if="$route.path == '/notice_user'" class="personal-main-info">
                    <personal-notice-user/>
                </div>

            </div>
        </div>
    </section>
</main>
</template>

<script>
import { mapGetters } from 'vuex';
import PersonalAsideMenuList from '../../components/account/PersonalAsideMenu.vue';
import PersonalDataUser from '../../components/account/PersonalDataUser.vue';
import PersonalCarUser from '../../components/account/PersonalCarUser.vue';
import PersonalTripsUser from '../../components/account/PersonalTripsUser.vue';
import PersonalNoticeUser from '../../components/account/PersonalNoticeUser.vue';

export default {
  name: 'AccountUser',
  data() {
    return {

    };
  },

  // Компоненты которые подключаем к нашему данному файлу
  components: {
    PersonalAsideMenuList,
    PersonalDataUser,
    PersonalCarUser,
    PersonalTripsUser,
    PersonalNoticeUser,
  },

  computed: {
    ...mapGetters(['user']),
  },

  methods: {

  },

  // Хука которая срабатывает когда компонент создается
  сreated() {
  },

};
</script>

<style>

</style>
