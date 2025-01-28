const mix = require('laravel-mix');

mix.js("resources/js/main.js", "public/assets/js")
.js("resources/js/swiper.js", "public/assets/js")
.postCss("resources/css/swiper.css", "public/assets/css")
.sass("resources/css/main.scss", "public/assets/css")
.options({
    postCss: [require("tailwindcss")],
})
.copyDirectory("resources/fonts", "public/assets/fonts")
.copy('node_modules/preline/dist/preline.js', 'public/assets/js/preline.js');


