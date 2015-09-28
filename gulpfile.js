var gulp = require('gulp');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var watch = require('gulp-watch');

gulp.task('browserify', function() {
  return browserify('./src/script.js')
    .transform(babelify)
    .require('./src/script.js')
    .bundle()
    .on("error", function (err) { console.log("Error: " + err.message); })
    .pipe(source('doge.min.js'))
    .pipe(gulp.dest('./'))
});

gulp.task('watch', function() {
  gulp.watch('src/script.js', ['browserify']);
});

gulp.task('default', ['watch']);
