<template>
  <img alt="The Audio Brew Logo" src="//theaudiobrew-uploads.s3-us-west-2.amazonaws.com/uploads/2019/08/logo-512.png" :width="size" :height="size"/>
</template>
<script>
  export default {
    name: 'Logo',
    props: {
      size: {
        type: Number,
        required: false,
        default: 400
      }
    }
  }
</script>
