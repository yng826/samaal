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
    .js('resources/js/admin/menu.js', 'public/js/admin')
    .babel(['public/js/admin/menu.js'], 'public/js/admin/menu.es5.js')
    .js('resources/js/admin/isoCertification.js', 'public/js/admin')
    .babel(['public/js/admin/isoCertification.js'], 'public/js/admin/isoCertification.es5.js')
    .autoload({
        jquery: ['$', 'jQuery', 'jquery'],
    })
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css');
