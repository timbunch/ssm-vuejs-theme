<template>
    <div v-if="page">
        <page-hero :page="page" height="300px">
            <v-row>
                <v-col cols="12" md="10" lg="8" xl="7">
                    <h1 class="display-2 font-weight-light" v-html="page.title.rendered"/>
                </v-col>
            </v-row>
        </page-hero>
        <v-container>
            <post-content :content="page.content.rendered"/>
        </v-container>
    </div>
</template>

<script>
  import store from '../store'
  import PostContent from "../components/content/PostContent";
  import PageHero from "../components/page-elements/PageHero";

  export default {
    name: 'page',
    components: {PageHero, PostContent},
    beforeRouteEnter(to, from, next) {
      store.dispatch('GET_PAGE', to.params.slug).then((page) => {
        store.dispatch('SET_PAGE_META', page);
      });
      next();
    },
    beforeRouteUpdate(to, from, next) {
      store.dispatch('GET_PAGE', to.params.slug).then((page) => {
        store.dispatch('SET_PAGE_META', page);
      });
      next();
    },
    computed: {
      page() {
        return this.$store.getters.PAGE(this.$route.params.slug);
      }
    }
  }
</script>
