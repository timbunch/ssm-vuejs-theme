import Home from "./js/pages/page-home";
import Page from "./js/pages/page";

export default [
  {
    component: Home,
    path: '/',
    name: 'home'
  },
  {
    component: Page,
    name: 'page',
    path: '/:slug/',
  },
  {
    component: Page,
    name: 'page',
    path: '/:parent/:slug/',
  }
]
