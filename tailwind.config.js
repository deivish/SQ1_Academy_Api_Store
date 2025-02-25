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
                poppins: ["Poppins", "sans-serif"],
                volkhov: ["Volkhov", "serif"],
                jost: ['Jost Variable', 'sans-serif'],
            },
            colors: {
                primary: "#ED1C24",
                black: "#191919",
                white: "#ffffff", 
                gray: "#777777",
                darkerGray: "#cccccc",
                lighterGray: "#fafafa",
                secondLighter: "#A86A3D",
            }
        },
    },
    plugins: [],
};
