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
mix.autoload({
    jquery: ['$',
    'window.jQuery',
    "jQuery",
    "window.$",
    "jquery",
    "window.jquery",
    'global.jQuery',
    "global.$",
    "global.jquery"
    ]
});
mix.js('resources/js/website.js', 'public/js')
	.sass('resources/sass/website.scss', 'public/css')
	.js('resources/js/admin.js', 'public/js')
	.sass('resources/sass/admin.scss', 'public/css')
	.options({ processCssUrls: false });
