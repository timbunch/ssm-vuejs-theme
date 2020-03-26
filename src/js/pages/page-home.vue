<template>
    <div v-if="page">
        <h1 v-html="page.title.rendered"/>
        <div v-html="page.content.rendered"></div>
    </div>
</template>

<script>
  export default {
    components: {},
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
          window.ssmSettings.frontPage = page.slug;
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
  }
</script>
