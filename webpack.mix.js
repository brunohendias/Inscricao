const mix = require('laravel-mix');
const path = require('path');

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

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            '@button': path.resolve('resources/js/components/shared/button'),
            '@input': path.resolve('resources/js/components/shared/input'),
            '@msg': path.resolve('resources/js/components/shared/msg'),
            '@select': path.resolve('resources/js/components/shared/select'),
            '@api': path.resolve('resources/js/core/api'),
            '@helpers': path.resolve('resources/js/core/helpers'),
        }
    }
})

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
