<template>
    <v-app-bar app :height="height" :hide-on-scroll="$vuetify.breakpoint.smAndDown">
        <v-container class="d-flex align-content-center">
            <v-toolbar-title class="text-center">
                <router-link class="text-no-underline" to="/">
                    <logo-typeface :width="logoWidth"/>
                </router-link>
            </v-toolbar-title>
            <v-spacer v-if="$vuetify.breakpoint.smAndUp"/>
            <primary-nav v-if="$vuetify.breakpoint.smAndUp"/>
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
    }
  }
</script>
