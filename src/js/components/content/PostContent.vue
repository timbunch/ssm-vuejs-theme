<template>
    <div class="post-content" v-html="content"></div>
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
