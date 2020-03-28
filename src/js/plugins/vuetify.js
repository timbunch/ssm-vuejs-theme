const Vue = require('vue');
import Vuetify from 'vuetify/lib';
Vue.use(Vuetify);

export default new Vuetify({
  icons: {
    iconfont: 'md', // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4'
  },
  theme: {
    themes: {
      light: {
        primary: '#0D47A1',
        secondary: '#2E7D32',
        accent: '#CCFF90',
        error: '#E65100',
      },
    }
  }
});
