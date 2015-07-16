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
});
elixir(function (mix) {
    mix.sass([
        "site.scss"
    ], "public/t/site/css/site.css");
});

elixir(function (mix) {
    mix.version(["t/site/js/site.js", "t/site/css/site.css"]);
});