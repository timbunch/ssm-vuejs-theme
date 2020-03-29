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
        padding: 4rem 0;
    }
</style>
