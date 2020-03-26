<template>
    <div v-if="page">
        <post-content :content="page.content.rendered"/>
    </div>
</template>

<script>
  import PostContent from "../components/content/PostContent";
  export default {
    components: {PostContent},
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
    }
  }
</script>
