<template>
    <v-app-bar
            hide-on-scroll
            fixed
            color="rgba(255,255,255,.9)"
            flat
            :height="height"
            :hide-on-scroll="$vuetify.breakpoint.smAndDown"
    >
        <v-container class="d-flex align-content-center">
            <v-toolbar-title class="text-center">
                <router-link class="text-no-underline" to="/">
                    <logo-typeface fill="#424242" :width="logoWidth"/>
                </router-link>
            </v-toolbar-title>
            <v-spacer/>
            <primary-nav v-if="$vuetify.breakpoint.smAndUp"/>
            <v-app-bar-nav-icon @click="toggleMenu" v-if="$vuetify.breakpoint.xsOnly"/>
        </v-container>
    </v-app-bar>
</template>
<script>
  import PrimaryNav from "../menus/PrimaryNav";
  import LogoTypeface from "./Logo";

  export default {
    name: 'page-navigation',
    components: {LogoTypeface, PrimaryNav},
    computed: {
      logoWidth() {
        return this.$vuetify.breakpoint.mdAndUp ? '200px' : '140px';
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
