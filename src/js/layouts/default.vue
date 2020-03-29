<template>
    <v-app>
        <v-app-bar app height="88">
            <v-container class="d-flex">
                <v-toolbar-title>
                    <router-link class="text-no-underline" to="/">
                        {{siteName}}
                    </router-link>
                </v-toolbar-title>
                <v-spacer/>
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
