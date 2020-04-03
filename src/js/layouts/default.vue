<template>
    <v-app>
        <page-navigation/>
        <navigation-drawer/>
        <v-content>
            <router-view></router-view>
        </v-content>
        <page-footer/>
    </v-app>
</template>
<script>
  import Vue from 'vue'
  import VueRouter from 'vue-router'
  import PrimaryNav from "../components/menus/PrimaryNav";
  import PageFooter from "../components/page-elements/PageFooter";
  import PageNavigation from "../components/page-elements/PageNavigation";
  import MobileNav from "../components/menus/MobileNav";
  import NavigationDrawer from "../components/menus/NavigationDrawer";

  Vue.use(VueRouter);

  export default {
    name: 'layout-default',
    components: {NavigationDrawer, MobileNav, PageNavigation, PageFooter, PrimaryNav},
    beforeMount() {
      this.$store.dispatch('GET_MENUS');
    }
  }
</script>
