const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'selector',
    
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
      extend: {
        fontFamily: {
            Inter: ["Inter", 'sans-serif'],
        },
        colors: {
            baseBlue: '#7AA1E2',
            baseLighterGreen: '#96E7E0',
            baseDarkerGreen: '#69D4DC',
            baseCream: '#F8F5E2',
            greyIcon: '#555555',
            greyBorder: '#D9D9D9',
            greyBackground: '#FCFCFC',
            success: '#56A92F',
            error: '#D60101'
        },
        fontSize: {
            title: '32px',
            subtitle: '22px',
            regularContent: '16px',
            smallContent: '14px',
        },
        dropShadow: {
            'regularShadow': '0px 0px 6px rgba(0,0,0,0.1)',
        },
        boxShadow: {
            'meetCardShadow': '0px 4px 10px 0 rgba(0,0,0,0.1)',
        },
    },
    },

    plugins: [require('@tailwindcss/forms')],
};