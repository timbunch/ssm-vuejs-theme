export default {
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
  pages: {}
}
