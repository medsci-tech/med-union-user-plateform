var elixir = require('laravel-elixir');

var gulp = require('gulp');

require('laravel-elixir-vue');
var apidoc = require('gulp-apidoc');

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

gulp.task('doc', function (done) {
  apidoc({
    src: "app/",
    dest: "public/apidoc/",
    config: ""
  }, done);
});

elixir(function (mix) {
  mix.sass([
        'app.scss',
        '../plugins/sweetalert/sweetalert.css',
        '../plugins/icheck-flat/blue.css'
        ])
     .webpack([
      'app.js',
      '../plugins/validate/jquery.validate.min.js',
      // '../plugins/validate/messages_zh.min.js',
      '../plugins/sweetalert/sweetalert.min.js',
      '../plugins/icheck-flat/jquery.icheck.min.js',
      '../plugins/icheck-flat/select2.min.js'
      ])
     .version(['css/app.css', 'js/app.js']);
  mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/css/fonts/bootstrap');
});

// gulp.task(function(done){
//     apidoc({
//         src: "app/",
//         dest: "apidoc/"
//     },done);
// });