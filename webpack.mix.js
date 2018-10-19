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



mix.styles([
  'resources/css/bootstrap.min.css',
  'resources/css/font-awesome.min.css',
  'resources/css/ionicons.min.css',
  'resources/css/dataTables.bootstrap.min.css',
  'resources/css/AdminLTE.min.css',
  'resources/css/_all-skins.min.css',
  'resources/css/style.css'
    ]

,'public/css/admin.css');

mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/jquery.dataTables.min.js',
    'resources/js/dataTables.bootstrap.min.js',
    'resources/js/jquery.slimscroll.min.js',
    'resources/js/fastclick.js',
    'resources/js/adminlte.min.js',
    'resources/js/demo.js',
    'resources/js/app.js',

],'public/js/admin.js');

mix.scripts([
    'resources/js/redis.js',

],'public/js/redis.js');




