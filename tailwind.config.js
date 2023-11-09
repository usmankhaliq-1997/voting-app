const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
       
        maxWidth:{
            custom:'68.5rem'
        },
        boxShadow: {
            card: '4px 4px 15px 0 rgba(36, 37, 38, 0.08)',
            dialog: '3px 4px 15px 0 rgba(36, 37, 38, 0.22)',
        },
        extend: {
            fontSize:{
                xxs : ['0.625rem',{lineHeight:'1rem'}],
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'),
            ],
};
