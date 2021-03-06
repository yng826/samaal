const mix = require('laravel-mix');
var LiveReloadPlugin = require('webpack-livereload-plugin');
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
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/recruit.js', 'public/js')
    .js('resources/js/job/Job.js', 'public/js/job.js')
    .js('resources/js/business.js', 'public/js')
    .js('resources/js/question.js', 'public/js')
    .js('resources/js/financial.js', 'public/js')
    .js('resources/js/irBoard.js', 'public/js')
    .js('resources/js/other/search.js', 'public/js')
    .js('resources/js/siteIntro.js', 'public/js')
    .sourceMaps()
    .extract(['vue','jquery'])
    .mergeManifest ()
    .autoload({
        jquery: ['$', 'jQuery', 'jquery'],
    })
    // .sass('resources/sass/vendor.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .options ({
        processCssUrls : false
    })
    .webpackConfig({
        plugins: [
            new LiveReloadPlugin()
        ]
    });
