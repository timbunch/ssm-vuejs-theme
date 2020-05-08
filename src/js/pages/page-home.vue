<template>
    <div v-if="page" class="page page-home">
        <page-hero height="570px" :page="page">
            <v-row>
                <v-col cols="12" md="10" lg="8" xl="7">
                    <div>
                        <blockquote class="mb-4" v-if="hero">
                            <p class="font-weight-light" :class="headingClass" v-html="hero.content"/>
                            <cite class="headline">{{hero.reference}}</cite>
                        </blockquote>
                        <btn-live-stream/>
                    </div>
                </v-col>
            </v-row>
        </page-hero>
        <v-container>
            <tiles :tiles="tiles" class="mt-8"/>
            <post-content :content="page.content.rendered"/>
        </v-container>
    </div>
</template>

<script>
  import PostContent from "../components/content/PostContent";
  import PageHero from "../components/page-elements/PageHero";
  import Tiles from "../components/tiles/Tiles";
  import BtnLiveStream from "../components/page-elements/BtnLiveStream";

  export default {
    components: {BtnLiveStream, Tiles, PageHero, PostContent},
    data() {
      return {
        page: null
      }
    },
    mounted() {
      this.$store.dispatch('GET_HERO');
      if (window.ssmSettings.frontPage) {
        this.$store.dispatch('GET_PAGE', window.ssmSettings.frontPage).then(page => {
          if (!page) {
            return false;
          }
          this.page = page;
          const metaTags = [
            {
              name: 'description',
              content: page.excerpt.rendered
            },
            {
              property: 'og:description',
              content: page.excerpt.rendered
            }
          ];
          this.$store.dispatch('SET_META_TITLE', `${page.title.rendered}`);
          // this.$store.dispatch('SET_META_TAGS', metaTags);
          this.$store.dispatch('WRITE_PAGE_META');
          this.$store.dispatch('GA_PAGE_TRACK');
        });
      }
    },
    computed: {
      tiles() {
        return this.$store.getters.PROP_KEY({prop: 'menus', key: 'homeTiles'})
      },
      hero() {
        return this.$store.getters.PROP('homeHero');
      },
      headingClass() {
        return this.$vuetify.breakpoint.smAndUp ? 'display-2' : 'display-1';
      }
    }
  }
</script>
