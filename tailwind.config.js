/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.html"],
  theme: {
    extend: {
      screens: {
        'mouse': {'raw': '(hover: hover)'},
      }
    }
  },
  plugins: [],
}