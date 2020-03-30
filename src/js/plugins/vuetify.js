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
        //primary: '#1565C0',
        primary: '#0277BD',
        secondary: '#01579B',
        accent: '#B3E5FC',
        error: '#E65100',
        light: '#ECEFF1'
      },
    }
  }
});
