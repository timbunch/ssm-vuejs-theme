<template>
    <v-list-item
            :to="item.parsedUrl.path"
            :href="item.link"
    >
        <v-list-item-icon v-if="item.classes">
            <v-icon>
                {{icon}}
            </v-icon>
        </v-list-item-icon>
        <v-list-item-title>
            <span v-html="item.title"/>
            <v-list-item-subtitle v-if="item.description" v-html="item.description"/>
        </v-list-item-title>
    </v-list-item>
</template>
<script>
  import {mdiBookOpenPageVariant, mdiCharity, mdiShieldCross, mdiChurch} from '@mdi/js';

  export default {
    name: 'nav-list-item',
    props: {
      item: {
        type: Object,
        required: true
      }
    },
    data() {
      return {
        mdiBookOpenPageVariant: mdiBookOpenPageVariant,
        mdiCharity: mdiCharity,
        mdiShieldCross: mdiShieldCross,
        mdiChurch: mdiChurch
      }
    },
    computed: {
      icon() {
        switch (this.item.classes) {
          case 'mdiCharity':
            return this.mdiCharity;
          case 'mdiShieldCross':
            return this.mdiShieldCross;
          case 'mdiChurch':
            return this.mdiChurch;
          default:
            return this.item.classes;
        }
      }
    }
  }
</script>
