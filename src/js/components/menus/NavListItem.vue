<template>
    <v-list-item
            :to="to"
            :href="href"
            :target="hrefTarget"
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
    },
    computed: {
      to() {
        return window.location.hostname === this.item.parsedUrl.host
          ? this.item.parsedUrl.path
          : undefined;
      },
      href() {
        return window.location.hostname === this.item.parsedUrl.host
          ? undefined
          : this.item.url
      },
      hrefTarget() {
        return this.target
          ? this.target
          : '_self'
      }
    }
  }
</script>
