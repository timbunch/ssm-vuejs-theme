import {Repository} from './Repository';

export default {
  get(type) {
    return Repository.get(`${type}`);
  },
  get_post_slug(type, slug) {
    return Repository.get(`${type}/?slug=${slug}`);
  },
}
