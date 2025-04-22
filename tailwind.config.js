/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/views/profile/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#00674F',       // Verde oscuro
        secondary: '#3EBB9E',     // Verde medio
        light: '#73E6CB',         // Verde claro
        deep: '#0A3C30',          // Verde profundo
        accent: '#FFD600',        // Amarillo mostaza vibrante
      },
    },
  },
  plugins: [],
};
