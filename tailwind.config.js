module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero-bg': "url('/images/hero-bg.jpg')",
      }
    },
    fontFamily: {
      'roboto': ['Roboto', 'sans-serif'],
    },
    screens: {
      'xs': '425px',
      'sm': '640px',
      'md': '1024px',
      'lg': '1280px',
    },
  },
  plugins: [],
}
