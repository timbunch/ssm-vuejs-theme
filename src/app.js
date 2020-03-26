const Vue = require('vue');
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router';
import store from './js/store';
import vuetify from './js/plugins/vuetify';
const infiniteScroll =  require('vue-infinite-scroll');
import Wrapper from './js/layouts/default';
import routes from './routes';

Vue.use(VueAxios, VueRouter, infiniteScroll);

const router = new VueRouter({
  mode: 'history',
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  },
  routes
});

if (document.getElementById('app')) {
  const app = new Vue({
    router,
    el: '#app',
    store,
    vuetify,
    components: {Wrapper}
  });
}
