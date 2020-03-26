<template>
    <v-app>
        <v-app-bar app>
            <router-link to="/">
                <v-toolbar-title>
                    Home
                </v-toolbar-title>
            </router-link>
            <primary-nav/>
        </v-app-bar>
        <v-content>
            <v-container>
                <v-fade-transition>
                    <router-view></router-view>
                </v-fade-transition>
            </v-container>
        </v-content>
        <v-footer fixed class="font-weight-light caption">
            <span>&copy; Simply Smart Media LLC</span>
            <v-spacer></v-spacer>
            <a href="https://www.privacypolicies.com/privacy/view/ef742e2aaad8c5a87265ada5d8fd783b"
               target="_blank">
                Privacy Policy</a>
        </v-footer>
    </v-app>
</template>
<script>
  import Vue from 'vue'
  import VueRouter from 'vue-router'
  import PrimaryNav from "../components/menus/PrimaryNav";

  Vue.use(VueRouter);

  export default {
    name: 'layout-default',
    components: {PrimaryNav},
    beforeMount() {
      this.$store.dispatch('GET_MENUS');
    },
    data() {
      return {}
    },
    computed: {},
    methods: {}
  }
</script>
