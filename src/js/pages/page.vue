<template>
    <div v-if="page" class="page" :class="`page-${$route.params.slug}`" :key="$route.params.slug">
        <v-slide-y-transition mode="out-in">
            <page-hero v-if="page && showPage" :page="page" height="300px">
                <v-row>
                    <v-col cols="12" md="10" lg="8" xl="7">
                        <h1 class="font-weight-light" :class="headingClass" v-html="page.title.rendered"/>
                        <btn-live-stream v-if="slug === 'sundays'" class="mt-8"/>
                        <tithly class="mt-8" v-if="slug === 'giving'" label="Give Online"/>
                    </v-col>
                </v-row>
            </page-hero>
        </v-slide-y-transition>
        <v-container>
            <v-fade-transition>
                <post-content
                        v-if="showPage"
                        :content="page.content.rendered"
                />
            </v-fade-transition>
            <v-fade-transition>
                <contact-form
                        v-if="['prayer-requests', 'contact-us', 'connect', 'venue-hire'].includes($route.params.slug)"
                />
            </v-fade-transition>
            <tiles
                    class="tiles-small"
                    v-if="tiles && showPage"
                    :tiles="tiles"
                    :height="160"
            />
        </v-container>
    </div>
</template>

<script>
  import store from '../store'
  import PostContent from "../components/content/PostContent";
  import PageHero from "../components/page-elements/PageHero";
  import Tiles from "../components/tiles/Tiles";
  import ContactForm from "../components/forms/ContactForm";
  import Tithly from "../components/page-elements/Tithly";
  import BtnLiveStream from "../components/page-elements/BtnLiveStream";

  export default {
    name: 'page',
    components: {BtnLiveStream, Tithly, ContactForm, Tiles, PageHero, PostContent},
    beforeRouteEnter(to, from, next) {
      store.dispatch('GET_PAGE', to.params.slug).then((page) => {
        store.commit('MUTATE_PROP_KEY', {prop: 'ui', key: 'showPage', value: true});
        store.dispatch('SET_PAGE_META', page);
      });
      next();
    },
    beforeRouteUpdate(to, from, next) {
      store.commit('MUTATE_PROP_KEY', {prop: 'ui', key: 'showPage', value: false});
      store.dispatch('GET_PAGE', to.params.slug).then((page) => {
        store.commit('MUTATE_PROP_KEY', {prop: 'ui', key: 'showPage', value: true});
        store.dispatch('SET_PAGE_META', page);
      });
      next();
    },
    computed: {
      slug() {
        return this.$route.params.slug;
      },
      page() {
        return this.$store.getters.PAGE(this.$route.params.slug);
      },
      showPage() {
        return this.$store.getters.PROP_KEY({prop: 'ui', key: 'showPage'});
      },
      tiles() {
        return this.$store.getters.PROP_KEY({prop: 'menus', key: this.$route.params.slug})
      },
      headingClass() {
        return this.$vuetify.breakpoint.smAndUp ? 'display-2' : 'display-1';
      }
    }
  }
</script>
