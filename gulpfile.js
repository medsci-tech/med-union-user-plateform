var elixir = require('laravel-elixir');

var gulp = require('gulp');

var webpack = require('webpack');

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

  Elixir.webpack.mergeConfig({
      devtool: "#source-map",
      plugins: [
          new webpack.optimize.UglifyJsPlugin({
              comments: false,
              compress: {
                  warnings: false
              }
          })
      ]
  });  

  mix.sass([
        'app.scss',
        ])
     .webpack([
      'app.js',
      '../plugins/validate/jquery.validate.min.js',
      // '../plugins/validate/messages_zh.min.js',
      ])
     .version(['css/app.css', 'js/all.js']);
  mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/css/fonts/bootstrap');
});

// gulp.task(function(done){
//     apidoc({
//         src: "app/",
//         dest: "apidoc/"
//     },done);
// });