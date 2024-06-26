const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .options({
      postCss: [require('postcss')],
      postCss: [require('tailwindcss')],
      postCss: [require('autoprefixer')],
   });
