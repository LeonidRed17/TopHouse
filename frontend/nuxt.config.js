export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  ssr: true,

  target: 'server',

  head: {
    title: 'TopHouse',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    { src: '~/node_modules/bootstrap/dist/css/bootstrap.min.css' },
    { src: '~/node_modules/bootstrap-icons/font/bootstrap-icons.css' }
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { src: '~/plugins/bootstrap.client.js', mode: 'client' }
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    '@nuxtjs/proxy',
  ],

  proxy: {
    '/api/': {
      target: 'http://127.0.0.1:8000', // Laravel API
      pathRewrite: { '^/api/': '/api/' }, // Фикс пути
      changeOrigin: true,
      secure: false, // Если HTTPS не настроен
    },
  },

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
  ],

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    transpile: ['bootstrap'],
  },

  compatibilityDate: '2025-02-18'
};