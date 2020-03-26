<template>
    <v-fade-transition>
        <div class="loading" v-if="loading">
            <div class="loading-blocks">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </v-fade-transition>
</template>
<script>
  export default {
    name: 'loading-blocks',
    data() {
      return {}
    },
    props: {
      loading: {
        type: Boolean,
        required: false,
        default: false
      }
    }
  }
</script>
<style lang="scss" scoped>
    .loading {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        align-content: center;

        &-blocks {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            margin: auto;

            > div {
                display: inline-block;
                position: absolute;
                left: 8px;
                width: 16px;
                background: #E29900;
                animation: loading-blocks 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;

                &:nth-child(1) {
                    left: 8px;
                    animation-delay: -0.24s;
                }

                &:nth-child(2) {
                    left: 32px;
                    animation-delay: -0.12s;
                }

                &:nth-child(3) {
                    left: 56px;
                    animation-delay: 0;
                }
            }
        }
    }

    @keyframes loading-blocks {
        0% {
            top: 8px;
            height: 64px;
        }
        50%, 100% {
            top: 24px;
            height: 32px;
        }
    }
</style>
