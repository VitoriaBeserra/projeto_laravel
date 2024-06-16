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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        }, 
        colors: {
            'fundo': '#005f73',
            'branco': '#ffffff',
            'verde': '#086b6f',
            'nav': '#309597',
        },
        image: {
            'logo': "url(/public/img/logo.png)",
        },
        backgroundImage: {
            'fundo': "url('/public/img/fundo.jpg')",
        },

    },
    

    plugins: [forms],
};
