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
                axiforma: ['Axiforma', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#5271FF',
                secondary: '#6BE5E8',
                tertiary: '#F7F8FC',
                display: '#134E6E',
                icongreen: '#3691A6',
                lightprimary: '#DBE5FF',
                darkprimary: '#101A7B',
            },
        },
    },

    plugins: [forms],
};
