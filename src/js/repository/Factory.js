import Wordpress from './Wordpress';

const repositories = {
  wp: Wordpress,
};

export default {
  get: name => repositories[name]
}
