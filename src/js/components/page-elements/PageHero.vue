<template>
    <div class="page-hero">
        <v-img
                v-if="page.featuredImage"
                gradient="0deg, rgba(0,0,0, .75), rgba(0,0,0,0) 70.71%"
                width="100%"
                height="50vh"
                class="white--text align-center"
                :src="page.featuredImage">
            <v-container>
                <slot></slot>
            </v-container>
        </v-img>
    </div>
</template>
<script>
  export default {
    name: 'page-hero',
    props: {
      page: {
        type: Object,
        required: true
      }
    }
  }
</script>
