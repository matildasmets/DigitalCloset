const mix = require('laravel-mix');

mix.js("resources/js/app.js", "public/js")
  .postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
  ])
  .copyDirectory("public/css/fonts", "public/fonts") 
  .copy('node_modules/preline/dist/preline.js', 'public/js/preline.js')
  .version()
  .sourceMaps();

