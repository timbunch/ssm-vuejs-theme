export default {
  homeHero: false,
  menus: {},
  meta: {
    metaTags: [
      {
        name: 'description',
        content: window.ssmSettings.siteDescription
      },
      {
        property: 'og:description',
        content: window.ssmSettings.siteDescription
      }
    ],
    title: window.ssmSettings.siteName
  },
  pages: {},
  ui: {
    mobileMenu: false
  }
}
