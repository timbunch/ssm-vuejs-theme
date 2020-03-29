<template>
    <v-col cols="12" lg="4">
        <v-card
                color="grey lighten-5"
                :to="routerLink"
                :class="tile.classes"
                :min-height="height"
                class="tile d-flex justify-center align-content-center"
                outlined
                :raised="raised"
                @mouseover="raised = true"
                @mouseleave="raised = false"
        >
            <div class="pa-8 text-center">
                <h3 v-html="tile.title"/>
                <div v-html="tile.description"/>
            </div>
        </v-card>
    </v-col>
</template>
<script>
  export default {
    name: 'tile',
    props: {
      tile: {
        type: Object,
        required: true,
        default: []
      }
    },
    data() {
      return {
        raised: false
      }
    },
    computed: {
      height() {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs':
            return '160px';
          case 'sm':
            return '200px';
          case 'md':
            return '240px';
          default:
            return '20vh';
        }
      },
      routerLink() {
        return this.tile.parsedUrl.path ? this.tile.parsedUrl.path : '#';
      },
    }
  }
</script>
<style lang="scss" scoped>
    .tile {
        flex-basis: 33%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
