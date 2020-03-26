export default {
  MUTATE_PROP: (state, {prop, value}) => {
    state[prop] = value;
  },
  MUTATE_PROP_KEY: (state, {prop, key, value}) => {
    state[prop] = {...state[prop], [key]: value}
  }
}
