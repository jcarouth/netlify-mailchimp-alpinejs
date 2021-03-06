module.exports = {
  purge: [
    'source/**/*.blade.php',
    'source/**/*.md',
    'source/**/*.html',
  ],
  theme: {
    extend: {},
  },
  variants: {
    extend: {
      translate: ['group-hover'],
    }
  },
  plugins: [],
};
