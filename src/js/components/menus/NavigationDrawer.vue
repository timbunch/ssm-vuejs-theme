<template>
    <v-navigation-drawer
            app
            color="primary"
            dark
            right
            temporary
            width="320"
            v-model="mobileMenu"
            v-if="$vuetify.breakpoint.xsOnly">
        <v-list>

            <v-list-item v-if="siteName">
                <v-list-item-title>
                    {{siteName}}
                </v-list-item-title>
                <v-list-item-icon>
                    <v-btn
                            icon
                            right
                            @click="mobileMenu = false"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-list-item-icon>
            </v-list-item>
            <mobile-nav/>
        </v-list>
    </v-navigation-drawer>
</template>
<script>
  import MobileNav from "./MobileNav";

  export default {
    name: 'navigation-drawer',
    components: {MobileNav},
    computed: {
      siteName() {
        return window.ssmSettings.siteName || false;
      },
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
