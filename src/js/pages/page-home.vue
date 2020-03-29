<template>
    <div v-if="page">
        <page-hero :page="page">
            <v-row>
                <v-col cols="12" md="8" lg="7" xl="6">
                    <h1 class="display-4 mb-4" v-html="page.title.rendered"></h1>
                    <div>
                        <!--<p>Live streaming will continue during gathering restrictions</p>-->
                        <p class="headline">Join us live on Sunday mornings 10:30 AM PST</p>
                        <v-btn
                                href="https://www.youtube.com/embed/live_stream?channel=UC5vBeXky8V3ImgnH7nOJB-w"
                                target="_blank"
                                color="primary"
                                rounded
                                x-large>
                            <v-icon large class="mr-2">live_tv</v-icon>
                            <span class="mt-2">Live Stream</span>
                        </v-btn>
                    </div>
                </v-col>
            </v-row>
        </page-hero>
        <v-container>
            <tiles :tiles="tiles"/>
            <post-content :content="page.content.rendered"/>
        </v-container>
    </div>
</template>

<script>
  import PostContent from "../components/content/PostContent";
  import PageHero from "../components/page-elements/PageHero";
  import Tiles from "../components/tiles/Tiles";

  export default {
    components: {Tiles, PageHero, PostContent},
    data() {
      return {
        page: null
      }
    },
    mounted() {
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
      }
    }
  }
</script>
