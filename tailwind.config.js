/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    './nuxt.config.{js,ts}',
    "./app.vue",
    "./error.vue",
  ],
  theme: {
    extend: {
      colors: {
        'custom': {
          50: '#f6f7f6',
          100: '#e3e5e2',
          200: '#c6cac5',
          300: '#a0a99f',
          400: '#7b867b',
          500: '#616b61',
          600: '#4c554c',
          700: '#40463f',
          800: '#353a35',
          900: '#313531',
          950: '#181b18',
        },
      }
    },
  },
  plugins: [],
}

