// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],

  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },

  app: {
    head: {
      title: 'AuthFetch',
      meta: [
        {
          name: 'description', content: 'Simple Authentication and Fetching of Data'
        }
      ],
      link: [
        {
          rel: 'shortcut icon', type: 'icon/ico', href: '/favicon.ico'
        }
      ]
    }
  },
})