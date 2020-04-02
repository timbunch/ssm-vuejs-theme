<template>
    <v-col cols="12" sm="4">
        <v-card
                dark
                :to="routerLink"
                :class="tile.classes"
                :min-height="height"
                class="tile"
                outlined
                :raised="raised"
                @mouseover="raised = true"
                @mouseleave="raised = false"
        >
            <div class="pa-4 text-center">
                <h3 class="headline font-weight-medium" v-html="tile.title"/>
                <div class="tile-divider"></div>
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
            return '300px';
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
        color: #ECEFF1;
        background-color: #0277BD;
        transition: all 500ms ease;

        &-divider {
            height: 2px;
            background-color: #B3E5FC;
            position: relative;
            margin: .5rem auto;
            width: 60%;
            transition: all 500ms ease;
        }

        &:hover {
            background-color: #01579B;

            .tile-divider {
                width: 80%;
                background-color: #ECEFF1;
                margin: .75rem auto;
            }
        }
    }
</style>
