import Factory from '../../repository/Factory';

const WpRepository = Factory.get('wp');

const generic = {
  SET_PAGE_META: ({dispatch}, page) => {
    if (!page) {
      return false;
    }
    const metaTags = [
      {
        name: 'description',
        content: page.excerpt.rendered
      },
      {
        property: 'og:description',
        content: page.excerpt.rendered
      }
    ];
    dispatch('SET_META_TITLE', `${page.title.rendered}`);
    dispatch('SET_META_TAGS', metaTags);
    dispatch('WRITE_PAGE_META');
    dispatch('GA_PAGE_TRACK');
  },
  SET_META_TAGS: ({commit}, value) => {
    commit('MUTATE_PROP_KEY', {prop: 'meta', key: 'metaTags', value});
  },
  SET_META_TITLE: ({commit}, value) => {
    commit('MUTATE_PROP_KEY', {prop: 'meta', key: 'title', value: `${value}  - ${window.ssmSettings.siteName}`});
  },
  SET_PROP: ({commit}, payload) => {
    commit('MUTATE_PROP', payload);
  },
  SET_PROP_KEY: ({commit}, payload) => {
    commit('MUTATE_PROP_KEY', payload)
  },
  GET_MENUS: ({commit}) => {
    return new Promise(async resolve => {
      const response = await WpRepository.get('menus');
      if (response.status === 200) {
        commit('MUTATE_PROP', {prop: 'menus', value: response.data});
        resolve(true);
        return true;
      }
      resolve(false);
    });
  },
  GET_PAGE: ({commit, getters}, slug) => {
    const page = getters.PAGE(slug);
    if (page) {
      return page;
    }
    return new Promise(async resolve => {
      const response = await WpRepository.get_post_slug('pages', slug);
      if (response.status === 200) {
        const page = response.data && response.data[0]
          ? response.data[0]
          : false;
        commit('MUTATE_PROP_KEY', {prop: 'pages', key: slug, value: page});
        resolve(page);
        return true;
      }
      resolve(false);
    });
  },
  GET_HEROS: ({commit}) => {
    return new Promise(async resolve => {
      const response = await WpRepository.get('ssm-home-page-hero');
      if (response.status === 200) {
        commit('MUTATE_PROP', {prop: 'heros', value: response.data.map(a => {
          return {
            content: a.content.rendered,
            reference: a.title.rendered
          }
          })});
      }
      resolve(true);
    });
  },
  WRITE_PAGE_META: ({getters}) => {
    const meta = getters.PROP('meta');
    document.title = meta.title;

    // Remove any stale meta tags from the document using the key attribute we set below.
    Array.from(document.querySelectorAll('[data-vue-router-controlled]')).map(el => el.parentNode.removeChild(el));

    // Turn the meta tag definitions into actual elements in the head.
    if (!meta.metaTags) next();
    meta.metaTags.map(tagDef => {
      const tag = document.createElement('meta');
      Object.keys(tagDef).forEach(key => {
        tag.setAttribute(key, tagDef[key]);
      });

      // We use this to track which meta tags we create, so we don't interfere with other ones.
      tag.setAttribute('data-vue-router-controlled', '');
      return tag;
    }).forEach(tag => document.head.appendChild(tag));
  },
  GA_PAGE_TRACK: () => {
    const obj = {
      hitType: 'pageview',
      location: window.location.href,
      page: window.location.pathname,
      title: document.title
    };
    if (window.location.hostname === 'localhost') {
      console.log('GA_PAGE_TRACK', JSON.stringify(obj));
      return true;
    }
    if (window.ga) {
      window.ga('send', obj);
    }
  },
  GA_EVENT_TRACK: ({}, {eventCategory, eventAction, eventLabel}) => {
    const obj = {
      hitType: 'event',
      eventCategory,
      eventAction,
      eventLabel
    };
    if (window.location.hostname === 'localhost') {
      console.log('GA_EVENT_TRACK', JSON.stringify(obj));
      return true;
    }
    if (window.ga) {
      window.ga('send', obj);
    }
  }
};

export default Object.assign(generic);
