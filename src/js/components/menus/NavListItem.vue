<template>
    <v-list-item
            :to="item.parsedUrl.path"
            :href="item.link"
    >
        <v-list-item-icon v-if="item.classes">
            <nav-item-icon :item="item.classes"/>
        </v-list-item-icon>
        <v-list-item-title>
            <span v-html="item.title"/>
            <v-list-item-subtitle v-if="item.description" v-html="item.description"/>
        </v-list-item-title>
    </v-list-item>
</template>
<script>
  import NavItemIcon from "./NavItemIcon";

  export default {
    name: 'nav-list-item',
    components: {NavItemIcon},
    props: {
      item: {
        type: Object,
        required: true
      }
    }
  }
</script>
