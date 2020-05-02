<template>
    <v-row class="tiles">
        <tile v-for="(tile, i) in tiles" :key="i" :tile="tile" :height="height"/>
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
      },
      height: {
        type: [String, Number],
        required: false,
        default: null
      }
    }
  }
</script>
