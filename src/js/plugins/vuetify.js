const Vue = require('vue');
import Vuetify from 'vuetify/lib';
Vue.use(Vuetify);

export default new Vuetify({
  icons: {
    iconfont: 'mdiSvg', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4'
  },
  theme: {
    themes: {
      light: {
        primary: '#4D4740',
        secondary: '#37332F',
        accent: '#E29900',
        error: '#b71c1c',
      },
    }
  }
});
