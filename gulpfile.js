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

elixir(function (mix) {
    mix.scripts(['site.js'], 'public/t/site/js/site.js');

    mix.sass([
        "bootstrap-0ez.scss"
    ], "public/plugins/bootstrap/css/bootstrap-0ez.css");

    mix.sass([
        "common.scss",
        "site.scss"
    ], "public/t/site/css/site.css");

    mix.sass([
        "common.scss",
        "root.scss"
    ], "public/t/root/css/root.css");

    mix.scripts(['root.js'], 'public/t/root/js/root.js');


    mix.version([
        "t/site/js/site.js",
        "t/site/css/site.css",
        "t/root/js/root.js",
        "t/root/css/root.css",
        "plugins/bootstrap/css/bootstrap-0ez.css"
    ]);
});