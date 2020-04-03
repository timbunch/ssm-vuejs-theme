<template>
    <v-list color="transparent">
        <v-list-item>
            <v-list-item-title>
                <h3>Additional Pages</h3>
            </v-list-item-title>
        </v-list-item>
        <nav-list-item v-for="(item, i) in items" :key="i" :item="item"/>
    </v-list>
</template>
<script>
  import NavListItem from "./NavListItem";

  export default {
    name: 'footer-menu',
    components: {NavListItem},
    computed: {
      items() {
        return this.$store.getters.PROP_KEY({prop: 'menus', key: 'footer'})
      }
    }
  }
</script>
