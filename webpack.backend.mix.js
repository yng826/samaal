const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');
require('laravel-mix-polyfill');
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

mix
    .js('resources/js/admin/menu.js', 'public/js/admin')
    .js('resources/js/admin/sitemap.js', 'public/js/admin')
    .js('resources/js/admin/isoCertification.js', 'public/js/admin')
    .js('resources/js/admin/recruit.js', 'public/js/admin')
    .js('resources/js/admin/question.js', 'public/js/admin')
    .extract(['vue','jquery-ui','jquery'], 'public/js/admin/vendor.js')
    .autoload({
        jquery: ['$', 'jQuery', 'jquery'],
    })
    // .babel(['public/js/admin/menu.js'], 'public/js/admin/menu.es5.js')
    // .babel(['public/js/admin/sitemap.js'], 'public/js/admin/sitemap.es5.js')
    // .babel(['public/js/admin/isoCertification.js'], 'public/js/admin/isoCertification.es5.js')
    // .babel(['public/js/admin/recruit.js'], 'public/js/admin/recruit.es5.js')
    .mergeManifest ()
    .sass('resources/sass/admin.scss', 'public/css');
