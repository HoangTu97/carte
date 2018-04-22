var gulp = require('gulp');
//var pug = require('gulp-pug');
//var less = require('gulp-less');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-csso');

gulp.task('sass', function(){
  return gulp.src('resources/asstes/sass/main.scss')
    .pipe(sass()) // Using gulp-sass
    .pipe(minifyCSS())
    .pipe(gulp.dest('public/css/'));
});

gulp.task('default', ['sass'], function(){
  gulp.watch(['resources/assets/sass/**/*.scss', 'public/css/*.css'], function() {
    gulp.run('sass');
});
});