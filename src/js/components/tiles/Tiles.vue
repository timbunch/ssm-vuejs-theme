<template>
    <v-row class="tiles">
        <tile v-for="(tile, i) in tiles" :key="i" :tile="tile"/>
    </v-row>
</template>
<script>
  import Tile from "./Tile";

  export default {
    name: 'tiles',
    components: {Tile},
    props: {
      tiles: {
        type: Array,
        required: true,
        default: []
      }
    }
  }
</script>
<style lang="scss" scoped>
    .tiles {
        display: flex;
        flex-wrap: wrap;

        @media (min-width: 600px) {
            padding: 2rem 0;
        }
        @media (min-width: 1264px) {
            padding: 4rem 0;
        }
    }
</style>
