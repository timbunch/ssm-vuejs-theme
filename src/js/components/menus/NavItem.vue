<template>
    <div class="nav-item">
        <v-btn
                text
                class="nav-item-link"
                :to="routerLink"
                v-if="routerLink"
                :class="{active: active}"
                color="primary"
                height="100%"
        >
            <span v-html="item.title"/>
        </v-btn>
        <v-btn
                text
                color="primary"
                height="100%"
                class="nav-item-link"
                :href="item.url"
                v-if="externalLink"
                target="_blank"
        >
            <span v-html="item.title"/>
        </v-btn>
        <v-btn
                color="primary"
                height="100%"
                class="nav-item-link"
                :href="item.url"
                v-if="!externalLink && hashtag"
        >
            <span v-html="item.title"/>
        </v-btn>
    </div>
</template>
<script>
  export default {
    name: 'nav-item',
    props: {
      item: {
        type: Object,
        required: true
      }
    },
    computed: {
      active() {
        return this.routerLink === this.$route.path;
      },
      externalLink() {
        return this.item.parsedUrl.host && this.item.parsedUrl.host !== window.location.hostname;
      },
      routerLink() {
        return !this.externalLink && this.item.parsedUrl.path;
      },
      hashtag() {
        return !!this.item.parsedUrl.fragment;
      }
    }
  }
</script>
<style lang="scss" scoped>
    .nav-item {
        display: flex;
        justify-content: center;
        align-items: center;

        &-link {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: #424242;
            text-decoration: none;
            position: relative;
            transition: color 250ms ease;
            padding: 0 1rem;
            @media (min-width: 600px) {
                font-size: 18px;
            }
            @media (min-width: 700px) {
                padding: 0 1.5rem;
            }
            @media (min-width: 800px) {
                padding: 0 2rem;
            }

            span {
                text-transform: none;
            }

            &:after {
                display: block;
                content: '';
                height: 4px;
                position: absolute;
                left: 2rem;
                right: 2rem;
                bottom: 0;
                background-color: transparent;
                transition: all 250ms ease;
                flex-basis: 100%;
            }

            &:before {
                background-color: transparent !important;
            }

            &:hover, &.active {

                &:after {
                    background-color: #0277BD;
                    left: 1rem;
                    right: 1rem;
                    bottom: 0;
                }
            }
        }
    }
</style>
