import axios from 'axios';

const baseURL = '/wp-json/wp/v2/';

const Repository = axios.create({
  baseURL
});

export {Repository}
