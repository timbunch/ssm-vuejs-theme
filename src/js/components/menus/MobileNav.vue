<template>
    <v-list>
        <nav-list-item v-for="(item, i) in items" :key="i" :item="item"/>
    </v-list>
</template>
<script>
    import NavListItem from "./NavListItem";
    export default {
      name: 'mobile-nav',
      components: {NavListItem},
      mounted: {

      },
      computed: {
        items() {
          return this.$store.getters.PROP_KEY({prop: 'menus', key: 'mobile'})
        }
      },
    }
</script>
