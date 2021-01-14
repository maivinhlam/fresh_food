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
    .js('resources/js/owl.carousel.js', 'public/js')
    .js('resources/js/adminlte.js', 'public/js')
    
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/AdminLTE.scss', 'public/css')
    .sass('resources/sass/owl.carousel.scss', 'public/css')
        
    // .copyDirectory('resources/plugins', 'public/plugins')
    // .copyDirectory('resources/css', 'public/css')
    // .copyDirectory('resources/js', 'public/js')
    
    mix.scripts([
        './node_modules/chart.js/dist/Chart.min.js',
    ], 'public/js/adminlte-js.js')
    mix.styles([
        './node_modules/@fortawesome/fontawesome-free/css/all.min.css',
    ], 'public/css/adminlte-css.css');
    ;

