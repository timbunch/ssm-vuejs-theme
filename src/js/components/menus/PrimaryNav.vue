<template>
    <div class="primary-nav">
        <nav-item v-for="(item, i) in nav" :key="i" :item="item"/>
    </div>
</template>
<script>
  import NavItem from "./NavItem";

  export default {
    name: 'primary-nav',
    components: {NavItem},
    computed: {
      nav() {
        return this.$store.getters.PROP_KEY({prop: 'menus', key: 'primary'})
      }
    }
  }
</script>
<style>
    .primary-nav {
        display: flex;
        justify-content: space-between;
    }
</style>
