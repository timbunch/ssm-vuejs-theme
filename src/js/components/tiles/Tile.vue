<template>
    <v-col cols="12" sm="4">
        <v-card
                dark
                :color="color"
                :to="routerLink"
                :class="tile.classes"
                :min-height="height"
                class="tile"
                outlined
                :raised="raised"
                @mouseover="onHoverEnter"
                @mouseleave="onHoverLeave"
        >
            <div class="pa-4 text-center">
                <nav-item-icon v-if="tile.classes" :item="tile.classes" class="mx-auto mb-2" size="44"/>
                <h3 class="headline font-weight-medium" v-html="tile.title"/>
                <div class="tile-divider"></div>
                <div v-html="tile.description"/>
            </div>
        </v-card>
    </v-col>
</template>
<script>
  import NavItemIcon from "../menus/NavItemIcon";

  export default {
    name: 'tile',
    components: {NavItemIcon},
    props: {
      tile: {
        type: Object,
        required: true,
        default: []
      }
    },
    data() {
      return {
        raised: false,
        color: 'primary'
      }
    },
    methods: {
      onHoverEnter() {
        this.raised = true;
        this.color = 'secondary';
      },
      onHoverLeave() {
        this.raised = false;
        this.color = 'primary';
      },
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
            .tile-divider {
                width: 80%;
                background-color: #ECEFF1;
                margin: .75rem auto;
            }
        }
    }
</style>
