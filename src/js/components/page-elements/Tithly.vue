<template>
    <div id="799780194402744172" style="width: 100%; overflow-y: hidden;" class="wcustomhtml" align="left">
        <v-btn
                color="primary"
                rounded
                large
                class="tithely-give-btn"
                data-church-id="1317241"
        >
            <v-icon left>{{mdiCharity}}</v-icon>
            {{label}}
        </v-btn>
    </div>
</template>
<script>
  import {mdiCharity} from '@mdi/js';

  export default {
    name: 'tithly',
    props: {
      label: {
        type: String,
        required: false,
        default: 'Give'
      }
    },
    data() {
      return {
        mdiCharity: mdiCharity
      }
    },
    mounted() {
      let tw = create_tithely_widget();
    }
  }
</script>
