<template>
    <v-app-bar
            hide-on-scroll
            fixed
            color="rgba(255,255,255,.9)"
            flat
            :height="height"
            :hide-on-scroll="$vuetify.breakpoint.mdAndDown"
    >
        <v-container class="d-flex align-content-center">
            <v-toolbar-title class="text-center">
                <router-link class="text-no-underline" to="/">
                    <logo-mini :width="logoWidth"/>
                    <!--<logo-full :width="logoWidth"/>-->
                </router-link>
            </v-toolbar-title>
            <v-spacer/>
            <primary-nav v-if="$vuetify.breakpoint.mdAndUp"/>
            <v-app-bar-nav-icon @click="toggleMenu" v-if="$vuetify.breakpoint.smAndDown"/>
        </v-container>
    </v-app-bar>
</template>
<script>
  import PrimaryNav from "../menus/PrimaryNav";
  import LogoMini from "./LogoMini";
  import LogoFull from "./LogoFull";

  export default {
    name: 'page-navigation',
    components: {LogoFull, LogoMini, PrimaryNav},
    computed: {
      logoWidth() {
        return this.$vuetify.breakpoint.mdAndUp ? '300px' : '240px';
      },
      height() {
        return this.$vuetify.breakpoint.mdAndUp ? '88' : '64';
      }
    },
    methods: {
      toggleMenu() {
        this.$store.dispatch('SET_PROP_KEY', {prop: 'ui', key: 'mobileMenu', value: true})
      }
    }
  }
</script>
