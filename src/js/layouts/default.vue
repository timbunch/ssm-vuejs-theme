<template>
    <v-app>
        <v-app-bar app height="88" :hide-on-scroll="$vuetify.breakpoint.smAndDown">
            <v-container class="d-md-flex">
                <v-toolbar-title class="text-center pb-2 pb-md-0">
                    <router-link class="text-no-underline" to="/">
                        {{siteName}}
                    </router-link>
                </v-toolbar-title>
                <v-spacer v-if="$vuetify.breakpoint.mdAndUp"/>
                <primary-nav/>
            </v-container>
        </v-app-bar>
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

  Vue.use(VueRouter);

  export default {
    name: 'layout-default',
    components: {PageFooter, PrimaryNav},
    beforeMount() {
      this.$store.dispatch('GET_MENUS');
    },
    data() {
      return {}
    },
    computed: {
      siteName() {
        return window.ssmSettings.siteName ? window.ssmSettings.siteName : 'Home';
      }
    },
    methods: {}
  }
</script>
