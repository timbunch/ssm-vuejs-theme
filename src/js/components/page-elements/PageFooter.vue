<template>
    <v-footer color="grey darken-3" dark class="page-footer mt-12">
        <v-container>
            <v-row>
                <v-col cols="12" md="4">
                    <v-list color="transparent">
                        <v-list-item>
                            <v-list-item-title>
                                <h3 v-html="siteName"/>
                            </v-list-item-title>
                        </v-list-item>
                        <v-list-item v-html="siteDescription"/>
                    </v-list>
                </v-col>
                <v-col cols="12" md="4">
                    <footer-menu/>
                </v-col>
                <v-col cols="12" md="4">
                    <v-list color="transparent">
                        <v-list-item>
                            <v-list-item-title>
                                <h3>Follow us on social media!</h3>
                            </v-list-item-title>
                        </v-list-item>
                        <v-list-item target="_blank" href="https://www.facebook.com/RockawayCommunityChurch/">
                            <v-list-item-icon>
                                <v-icon>{{facebook}}</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>
                                Facebook
                            </v-list-item-title>
                        </v-list-item>
                        <v-list-item target="_blank" href="https://www.youtube.com/channel/UC5vBeXky8V3ImgnH7nOJB-w">
                            <v-list-item-icon>
                                <v-icon>{{youtube}}</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>
                                Youtube
                            </v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="d-flex">
                    <span>&copy; Rockaway Community Church</span>
                    <v-spacer></v-spacer>
                    <a
                            href="#"
                            target="_blank">
                        Privacy Policy</a>
                </v-col>
            </v-row>
        </v-container>
    </v-footer>
</template>
<script>
  import {mdiFacebook, mdiYoutube} from '@mdi/js';
  import FooterMenu from "../menus/FooterMenu";

  export default {
    name: 'page-footer',
    components: {FooterMenu},
    data() {
      return {
        facebook: mdiFacebook,
        youtube: mdiYoutube
      }
    },
    computed: {
      siteDescription() {
        return window.ssmSettings.siteDescription;
      },
      siteName() {
        return 'About ' + window.ssmSettings.siteName;
      }
    }
  }
</script>
<style lang="scss">
    .page-footer {
        background-image: url('https://rockawaychurch.com/wp-content/uploads/2020/05/roofline-bg-light.svg');
        background-repeat: no-repeat;
        background-position: top left;
        background-size: 100%;
    }
</style>
