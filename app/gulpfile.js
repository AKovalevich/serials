"use strict";

// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');
var path = require('path');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync');
var autoprefixer = require('gulp-autoprefixer');
var spritesmith = require('gulp.spritesmith');
var image = require('gulp-image');

gulp.task('sprite', function () {
  var spriteData = gulp.src('assets/images/*.jpg').pipe(spritesmith({
    imgName: 'sprite.png',
    cssName: 'sprite.css'
  }));
  // We need to optimize sprite image.
  gulp.src('assets/css/sprite.png')
    .pipe(image({
      pngquant: true,
      optipng: false,
      zopflipng: true,
      advpng: true,
      jpegRecompress: false,
      jpegoptim: true,
      mozjpeg: true,
      gifsicle: true,
      svgo: true
    }))
    .pipe(gulp.dest('./assets/css/'));

  return spriteData.pipe(gulp.dest('./assets/css/'));
});

gulp.task('less', function () {
  gulp.src('./assets/less/main.less')
    .pipe(less())
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false,
      remove: false
    }))
    .pipe(sourcemaps.write())
    .pipe(minifyCSS())
    .pipe(gulp.dest('./assets/css'))
    .pipe(browserSync.reload({stream: true}));
});

// Concatenate & Minify JS
gulp.task('scripts', function () {
  return gulp.src([
    'assets/js/vendor/jquery/dist/jquery.js',
    'assets/js/vendor/jquery-ui/jquery-ui.js',
    'assets/js/vendor/angular/angular.js',
    'assets/js/vendor/angular-animate/angular-animate.js',
    'assets/js/vendor/angular-aria/angular-aria.js',
    'assets/js/vendor/angular-material/angular-material.js',
    'assets/js/vendor/angular-messages/angular-messages.js',
    'assets/js/vendor/angular-swipe/dist/angular-swipe.js',
    'assets/js/vendor/angular-sanitize/angular-sanitize.js',
    'assets/js/vendor/angular-carousel-3d/dist/carousel-3d.js',
    'assets/js/vendor/angular-route/angular-route.js',
    'assets/js/vendor/slick-carousel/slick/slick.js',
    'assets/js/vendor/angular-slick/dist/slick.js',
    'assets/js/vendor/angular-preload-image/angular-preload-image.min.js',
    'assets/js/vendor/videogular/videogular.js',
    'assets/js/vendor/videogular-controls/vg-controls.js',
    'assets/js/vendor/videogular-overlay-play/vg-overlay-play.js',
    'assets/js/vendor/videogular-poster/vg-poster.js',
    'assets/js/vendor/videogular-buffering/vg-buffering.js',
    'assets/js/vendor/dash/dash.all.min.js',
    'assets/js/vendor/videogular-dash/vg-dash.js',
    'assets/js/cinema_portal/App.js',
    'assets/js/cinema_portal/App.route.js',
    'assets/js/cinema_portal/TopSliderController.js',
    'assets/js/cinema_portal/GridController.js',
    'assets/js/cinema_portal/WatchPageController.js',
    'assets/js/cinema_portal/LandingPageController.js',
    'assets/js/cinema_portal/LoginPageController.js'
  ])
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js'))
    .pipe(browserSync.reload({stream: true}));
});

// Watch Files For Changes
gulp.task('watch', function () {
  //browserSync({
  //  proxy: "localhost"
  //});
  //gulp.watch('assets/js/**/*.js', ['scripts']);
  gulp.watch('assets/less/**/*.less', ['less']);
  gulp.watch('assets/less/**/integrate.less', ['integrate-less']);
  gulp.watch('assets/images/*.jpg', ['sprite']);
});

// Default Task
gulp.task('default', ['less', 'scripts', 'sprite', 'watch']);

// Compile CSS
gulp.task('watch-css', ['less', 'sprite', 'watch']);