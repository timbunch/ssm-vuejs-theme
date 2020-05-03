<template>
    <div class="page-hero">
        <div
                v-if="page.featuredImage"
                class="page-hero-image"
                :style="`background-image: url(${page.featuredImage})`"
        >
            <v-container class="page-hero-container">
                <slot></slot>
            </v-container>
        </div>
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
            align-items: center;
            color: #FAFAFA;
            display: flex;
            padding: 1rem 0;
            position: relative;
            background-size: cover;
            background-position: center;
            &:before {
                background: linear-gradient(0deg, rgba(0,0,0, .5) 0%, rgba(0,0,0,.15) 70.71%);
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1;
            }
            @media (min-width: 600px) {
                padding: 2rem 0;
            }
            @media (min-width: 900px) {
                padding: 4rem 0;
            }
            @media (min-width: 1200px) {
                padding: 6rem 0;
            }
        }

        &-container {
            padding-top: 88px;
            z-index: 2;
        }
    }
</style>
