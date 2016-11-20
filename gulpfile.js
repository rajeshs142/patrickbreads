var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('slick-theme.scss');
    mix.sass('slick.scss');
    mix.sass('font-awesome.scss');

    mix.styles([
        "bootstrap.css",
        "font-awesome.css",
        "app.css",
        "slick.css",
        "slick-theme.css"
    ], 'public/css/all.css', 'public/css');

    mix.scripts([
        "jquery.min.js",
        "bootstrap.min.js",
        "slick.js",
        "laravel.js",
        "app.js"
    ], 'public/js/all.js', 'public/js');

    mix.version(["/css/all.css", "/js/all.js"]);
});
