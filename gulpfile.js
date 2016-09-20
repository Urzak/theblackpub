var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache');
var minifycss = require('gulp-minify-css');
var stylus = require('gulp-stylus');
var browserSync = require('browser-sync');

/*
gulp.task('browser-sync', function() {
  browserSync({
    server: {
       baseDir: "./"
    }
  });
}); */ 

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost/theblackpub"
    });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

gulp.task('images', function(){
  gulp.src('assets/img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('img/'));
});
gulp.task('styles', function(){
  gulp.src(['assets/css/main.styl'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(stylus({
      compress: true,
      'include css': true
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('scripts', function(){
  return gulp.src('assets/js/**/*.js')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('js/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('default', ['styles', 'scripts', 'browser-sync'], function(){
  gulp.watch("assets/css/**/*.styl", ['styles']);
  gulp.watch("assets/js/**/*.js", ['scripts']);
  gulp.watch("*.php", ['bs-reload']);
  gulp.watch("views/**/*.twig", ['bs-reload']);
});