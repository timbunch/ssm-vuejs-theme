<template>
    <v-icon>
        {{icon}}
    </v-icon>
</template>
<script>
  import {mdiBookOpenPageVariant, mdiCharity, mdiShieldCross, mdiChurch} from '@mdi/js';

  export default {
    name: 'nav-item-icon',
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
        switch (this.item) {
          case 'mdiCharity':
            return this.mdiCharity;
          case 'mdiShieldCross':
            return this.mdiShieldCross;
          case 'mdiChurch':
            return this.mdiChurch;
          default:
            return this.item;
        }
      }
    }
  }
</script>
