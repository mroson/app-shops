/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/views/**/*.blade.php', // Asegúrate de que tus vistas Blade estén incluidas
      './resources/views/profile/*.blade.php', // Asegúrate de que tus vistas Blade estén incluidas

      './resources/js/**/*.js', // Si tienes archivos JS que usen Tailwind
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  };
  