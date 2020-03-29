<template>
    <div class="page-hero">
        <v-img
                v-if="page.featuredImage"
                gradient="0deg, rgba(0,0,0, .75), rgba(0,0,0,.5) 70.71%"
                width="100%"
                :height="height"
                class="align-center page-hero-image"
                :src="page.featuredImage"
        >
            <v-container>
                <slot></slot>
            </v-container>
        </v-img>
        <v-container v-else>
            <slot></slot>
        </v-container>
    </div>
</template>
<script>
  export default {
    name: 'page-hero',
    props: {
      page: {
        type: Object,
        required: true
      },
      height: {
        type: String,
        required: false,
        default: '50vh'
      }
    }
  }
</script>
<style lang="scss" scoped>
    .page-hero {
        &-image {
            color: #FAFAFA;
        }
    }
</style>
