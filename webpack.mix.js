const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')    
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/AdminLTE-3.0.5/AdminLTE.scss', 'public/css')
    .copyDirectory('resources/plugins', 'public/plugins')
    .copyDirectory('resources/css', 'public/css')
    .copyDirectory('resources/js', 'public/js')
    ;

