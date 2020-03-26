export default {
  PROP: (state) => (prop) => {
    return state[prop];
  },
  PROP_KEY: (state) => ({prop, key}) => {
    return state[prop][key] ? state[prop][key] : false;
  },
  PAGE: (state) => (page) => {
    return state.pages[page] ? state.pages[page] : false;
  }
}
