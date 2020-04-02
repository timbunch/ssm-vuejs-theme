<template>
    <v-list color="transparent">
        <v-list-item>
            <v-list-item-title>
                <h3>Additional Pages</h3>
            </v-list-item-title>
        </v-list-item>
        <v-list-item
                v-for="(item, i) in nav"
                :key="i"
                :to="item.parsedUrl.path"
                :href="item.link"
        >
            <v-list-item-icon v-if="item.classes">
                <v-icon>
                    {{icon(item.classes)}}
                </v-icon>
            </v-list-item-icon>
            <v-list-item-title>
                <span v-html="item.title"/>
                <v-list-item-subtitle v-if="item.description" v-html="item.description"/>
            </v-list-item-title>
        </v-list-item>
    </v-list>
</template>
<script>
  import NavItem from "./NavItem";
    import {mdiBookOpenPageVariant, mdiCharity, mdiShieldCross, mdiChurch} from '@mdi/js';
  export default {
    name: 'footer-menu',
    components: {NavItem},
    data() {
      return {
        mdiBookOpenPageVariant: mdiBookOpenPageVariant,
        mdiCharity: mdiCharity,
        mdiShieldCross: mdiShieldCross,
        mdiChurch: mdiChurch
      }
    },
    computed: {
      nav() {
        return this.$store.getters.PROP_KEY({prop: 'menus', key: 'footer'})
      }
    },
    methods: {
      icon(value) {
        switch(value) {
          case 'mdiCharity': return this.mdiCharity;
          case 'mdiShieldCross': return this.mdiShieldCross;
          case 'mdiChurch': return this.mdiChurch;
          default: return value;
        }
      }
    }
  }
</script>
<style>
    .primary-nav {
        display: flex;
    }
</style>
