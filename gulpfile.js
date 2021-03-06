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
    mix.sass('app.scss')
    	.styles('./node_modules/sweetalert/dist/sweetalert.css')
        .scripts([
        	'./node_modules/jquery/dist/jquery.min.js',
        	'./node_modules/materialize-css/bin/materialize.js',
        	'./node_modules/vue/dist/vue.js',
        	'./node_modules/vue-resource/dist/vue-resource.js',
        	'./node_modules/vue-validator/dist/vue-validator.js',
        	'./node_modules/sweetalert/dist/sweetalert.min.js'
        ]);
});