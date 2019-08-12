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

    // mix.sass('resources/sass/app.scss', 'public/css');
    
    // mix.js('resources/js/app.js', 'public/js')

    // mix.scripts(['resources/js/main.js',
    //         'resources/js/bootstrap.js'], 'public/js/main.js');

    mix.styles(['resources/css/style.css',
            'resources/css/all.min.css'], 'public/css/style.css')
    // .copyDirectory('resources/img', 'public/img');
