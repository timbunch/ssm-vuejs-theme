<template>
    <h1>A PAGE</h1>
</template>
<script>
  export default {
    name: 'page',
    computed: {
      page() {
        return this.$store.getters.PROP('page');
      }
    }
  }
</script>
