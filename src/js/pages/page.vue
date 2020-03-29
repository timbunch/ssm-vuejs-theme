<template>
    <v-container v-if="page" class="page">
        <h1 v-html="page.title.rendered"/>
        <post-content :content="page.content.rendered"/>
    </v-container>
</template>

<script>
  import store from '../store'
  import PostContent from "../components/content/PostContent";

  export default {
    name: 'page',
    components: {PostContent},
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
