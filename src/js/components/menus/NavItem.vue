<template>
    <div class="nav-item">
        <router-link class="nav-item-link" :to="routerLink" v-if="routerLink">
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
        &-link {
            padding: 0 .5rem;
            &:first-child {
                margin-left: .5rem;
            }
        }
    }
</style>
