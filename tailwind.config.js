import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';




/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
        "poppins": ['Poppins', 'sans-serif'],
      },
      colors: {
        "cp-black": "#0a0510",
        "cp-dark-blue": "#603393",
        "cp-pale-orange": "#FFEDD1",
        "cp-light-grey": "#848FA7",
        "cp-light-blue": "#007AFF",
        "cp-pale-blue": "#f2f8ff",
      }
    },
    },

    plugins: [forms, require('@tailwindcss/typography'),],
    
};
