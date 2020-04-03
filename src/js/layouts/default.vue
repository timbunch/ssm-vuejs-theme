<template>
    <v-app>
        <page-navigation/>
        <v-navigation-drawer
                color="primary"
                dark
                v-model="mobileMenu"
                right
                app
                temporary
                width="320"
                v-if="$vuetify.breakpoint.xsOnly">
            <v-list>
                <mobile-nav/>
            </v-list>
        </v-navigation-drawer>
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

  Vue.use(VueRouter);

  export default {
    name: 'layout-default',
    components: {MobileNav, PageNavigation, PageFooter, PrimaryNav},
    beforeMount() {
      this.$store.dispatch('GET_MENUS');
    },
    computed: {
      mobileMenu: {
        get() {
          return this.$store.getters.PROP_KEY({prop: 'ui', key: 'mobileMenu'});
        },
        set(value) {
          this.$store.dispatch('SET_PROP_KEY', {prop: 'ui', key: 'mobileMenu', value})
        }
      }
    }
  }
</script>
