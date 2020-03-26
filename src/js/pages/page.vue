<template>
    <div v-if="page">

        <h1 v-html="page.title.rendered"/>
        <div v-html="page.content.rendered"></div>
    </div>
</template>

<script>
  export default {
    name: 'page',
    components: {},
    data() {
      return {
        page: null
      }
    },

    mounted() {
      this.$store.dispatch('GET_PAGE', this.$route.params.slug).then(page => {
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
  }
</script>
