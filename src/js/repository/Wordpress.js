import {Repository} from './Repository';

export default {
  get(type, slug) {
    return Repository.get(`${type}/${slug}`);
  },
}
