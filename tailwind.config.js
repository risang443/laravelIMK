/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        fontFamily: {
            pop: ["Poppins"],
          },
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                "text-prime": "#1A202C",
                "text-second": "#FEB913",
                "button-prime": "#FEB913",
                "button-second": "#BFE1F1",
                "prime":"#292B35",
                "secondary" : "#14272E",
                "merah" : "#D80000",
            },
            screens: {
                sm: "640px",

                md: "768px",

                lg: "1024px",

                xl: "1280px",

                "2xl": "1320px",
            },
        },
    },
    plugins: [
        require("tw-elements/dist/plugin.cjs"),
        require('flowbite/plugin')({
            charts: true,
        }),
    ],
};
