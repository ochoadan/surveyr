const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  theme: {
    extend: {
        fontFamily: {
            sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        },
        colors: {
            'surveyr-bg': '#f8f8fc',
            'surveyr-blue': '#0f63c9',
            'surveyr-blue-dark': '#0c305c',
        },
    },
  },
  variants: {},
  plugins: [
      require('@tailwindcss/ui'),
  ],
}
