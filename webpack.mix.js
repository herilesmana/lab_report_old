let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/assets/js')
   .sass('resources/assets/sass/style.scss', 'public/assets/css');
   mix.options({
     processCssUrls: false // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
   });
