<template>
    <v-app>
        <page-navigation/>
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

  Vue.use(VueRouter);

  export default {
    name: 'layout-default',
    components: {PageNavigation, PageFooter, PrimaryNav},
    beforeMount() {
      this.$store.dispatch('GET_MENUS');
    }
  }
</script>
