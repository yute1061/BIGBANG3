const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/profile.scss', 'public/css')
    .sass('resources/sass/front.scss', 'public/css') 
    .sass('resources/sass/front_width_max480.scss', 'public/css')
    .sass('resources/sass/page.scss', 'public/css') 
    .sass('resources/sass/toppage.scss', 'public/css') 
    .sass('resources/sass/toppage_width_max480.scss', 'public/css') 
    .sourceMaps();
