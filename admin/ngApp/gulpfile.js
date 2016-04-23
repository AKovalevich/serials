// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var less   = require('gulp-less');

gulp.task('less', function () {
  gulp
    .src([
      './less/main.less',
      './less/assets.less',
      './less/bootstrap.less'
    ])
    .pipe(less())
    .pipe(gulp.dest('./css'));
});
