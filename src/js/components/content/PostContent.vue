<template>
    <div class="post-content">
        <slot></slot>
        <div v-html="content"></div>
    </div>
</template>
<script>
    export default {
      name: 'post-content',
      props: {
        content: {
          type: String,
          required: false,
          default: ''
        }
      }
    }
</script>
<style lang="scss" scoped>
    .post-content {
        padding: 3rem 0;
    }
</style>
