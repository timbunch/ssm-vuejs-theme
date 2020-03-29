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
        primary: '#1565C0',
        secondary: '#0D47A1',
        accent: '#B3E5FC',
        error: '#E65100',
      },
    }
  }
});
