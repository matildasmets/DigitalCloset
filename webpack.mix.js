const mix = require('laravel-mix');

mix.js("resources/js/**/*.js", "public/assets/js")
.sass("resources/css/main.scss", "public/assets/css")
.options({
    postCss: [require("tailwindcss")],
})
.copyDirectory("resources/fonts", "public/assets/fonts")
.copy('node_modules/preline/dist/preline.js', 'public/js/preline.js');


