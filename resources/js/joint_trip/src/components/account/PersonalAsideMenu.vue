<template>
<div class="personal-main-menu">
  <ul class="personal-main-menu-list">

      <!-- Перебором personalAsideMenuList создаем пункты меню-->
      <li v-for="(itemMenu, index) in personalAsideMenuList" :key="index"
        class="personal-main-menu-link" v-bind:class="{ active: itemMenu.selected }">
          <router-link :to="itemMenu.link" class="btm-go-main"
            @click="selectItem(index)"
          >{{itemMenu.name}}</router-link>
      </li>

  </ul>
</div>
</template>

<script>
export default {
  name: 'PersonalAsideMenu',

  // Здесь описываются переемные которые будут пробрасываться в этот компонент
  props: [''],

  data() {
    return {
      personalAsideMenuList: [
        {
          name: 'На Главную',
          link: '/',
          selected: false,
        },
        {
          name: 'Личные данные',
          link: '/account_user',
          selected: false,
        },
        {
          name: 'Мой автомобиль',
          link: '/car_user',
          selected: false,
        },
        {
          name: 'Мои поездки',
          link: '/trips_user',
          selected: false,
        },
        {
          name: 'Уведомления',
          link: '/notice_user',
          selected: false,
        },
      ],

    };
  },

  methods: {

    resetSelect() {
      for (let i = 0; i < this.personalAsideMenuList.length; i += 1) {
        this.personalAsideMenuList[i].selected = false;
      }
    },

    // обработчик события нажатия на пункт меню
    // очищаем переемную с выбранным пунктом
    // и записываем по индексу true
    selectItem(index) {
      this.resetSelect();
      this.personalAsideMenuList[index].selected = true;
    },

    searchLink() {
      for (let i = 0; i < this.personalAsideMenuList.length; i += 1) {
        if (this.personalAsideMenuList[i].link === this.$route.path) {
          return i;
        }
      }
      return 1;
    },

  },

  // Хука которая срабатывает когда компонент Монтируется в наше приложение
  // Здесь определяем какой индекс нашей ссылки
  // после этого отправляем его в метод где устанавливается флаг selected для выделения ссылки
  mounted() {
    const index = this.searchLink();
    this.selectItem(index);
  },

};
</script>

<style>

</style>
