<template>
    <div class="nav-item">
        <router-link
                class="nav-item-link"
                :to="routerLink"
                v-if="routerLink"
                :class="{active: active}"
        >
            <span v-html="item.title"/>
        </router-link>
        <a class="nav-item-link" :href="item.url" v-if="externalLink" target="_blank">
            <span v-html="item.title"/>
        </a>
        <a class="nav-item-link" :href="item.url" v-if="!externalLink && hashtag">
            <span v-html="item.title"/>
        </a>
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
            color: #1565C0;
            text-decoration: none;
            position: relative;
            transition: color 250ms ease;
            @media (min-width: 600px) {
                padding: 0 2rem;
                font-size: 18px;
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
                flex-basis:100%;
            }

            &:hover, &.active {
                color: #0D47A1;

                &:after {
                    background-color: #1565C0;
                    left: 1.5rem;
                    right: 1.5rem;
                    bottom: 0;
                }
            }
        }
    }
</style>
