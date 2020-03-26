<template>
    <v-menu bottom left>
        <template v-slot:activator="{ on }">
            <v-btn
                    color="accent"
                    icon
                    v-on="on"
            >
                <v-icon>share</v-icon>
            </v-btn>
        </template>
        <v-list>
            <v-list-item
                    v-for="(item, i) in items"
                    :key="i"
                    :href="item.action"
                    target="_blank"
            >
                <v-list-item-icon v-if="item.icon">
                    <component  v-bind:is="item.icon" />
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item class="clipboard" @click="copyThis">
                <v-list-item-icon>
                    <v-icon color="accent">link</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>Copy URL</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-menu>
</template>
<script>
  import IconFacebook from "../icons/IconFacebook";
  import IconTwitter from "../icons/IconTwitter";
  export default {
    name: 'share-this',
    components: {IconTwitter, IconFacebook},
    props: {
      post: {
        type: Object,
        required: true,
      }
    },
    computed: {
      items() {
        return [
          {
            title: 'Facebook',
            icon: 'icon-facebook',
            action: `https://www.facebook.com/sharer.php?u=${this.post.canonical}`
          },
          {
            title: 'Twitter',
            icon: 'icon-twitter',
            action: `https://twitter.com/intent/tweet?text=${this.headline} - via @TheAudioBrew ${this.post.canonical}`
          },
        ]
      },
      headline() {
        return this.post.headline ? this.post.headline.replace('%', ' Percent') : '';
      }
    },
    methods: {
      copyThis() {
        const str = this.post.canonical;
        const el = document.createElement('textarea');
        el.value = str;
        el.setAttribute('readonly', '');
        el.style.position = 'absolute';
        el.style.left = '-9999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
      }
    }
  }
</script>
