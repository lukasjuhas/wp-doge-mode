var gulp = require('gulp');
var browserify = require('browserify');
var babelify = require('babelify');
var watch = require('gulp-watch');
var uglify = require('gulp-uglify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');

gulp.task('browserify', function() {
  return browserify('./src/script.js')
    .transform(babelify)
    .require('./src/script.js', { entry: true })
    .bundle()
    .on("error", function (err) { console.log("Error: " + err.message); })
    .pipe(source('doge.min.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest('./'));
});

gulp.task('watch', ['browserify'], function() {
  gulp.watch('src/script.js', ['browserify']);
});

gulp.task('default', ['browserify']);
