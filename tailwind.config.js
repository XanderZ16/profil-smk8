import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#8377D1',
                'secondary': '#FFFFFF',
                'accent': '#C3512F',
                'neutral': '#F5F5F5',
            },
            fontFamily: {
                'outfit': ['Outfit', 'sans-serif'],
                'roboto': ['Roboto', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
