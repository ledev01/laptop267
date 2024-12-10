/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        'custom-orange': '#ff5622',  
        'customhover-orange': '#FF3333',  
      },  
      fontFamily: {
        'merriweather': ['Merriweather', 'serif'],
              },
    },
  },
  plugins: [],
}