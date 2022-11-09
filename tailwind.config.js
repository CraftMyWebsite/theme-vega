/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './dev/**/*.{php,html,js}'
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
  darkMode: 'class',
}
