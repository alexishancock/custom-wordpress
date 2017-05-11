// *************************************
//
//   Gulpfile
//
// *************************************
//
// Available tasks:
//
// *************************************
var gulp = require('gulp');

var sass   = require('gulp-sass'),
cleanCSS   = require('gulp-clean-css'),
sourcemaps = require('gulp-sourcemaps'),
concat     = require('gulp-concat'),
cleanCSS   = require('gulp-clean-css'),
watch      = require('gulp-watch'),
rename     = require('gulp-rename'),
uglify     = require('gulp-uglify'),
notify     = require('gulp-notify'),
sourcemaps = require('gulp-sourcemaps');

// -------------------------------------
//   Task: default
// -------------------------------------
gulp.task('default', function() {
  // place code for your default task here
});

// -------------------------------------
//   Task: sass
// -------------------------------------
gulp.task('sass', function () {
  return gulp.src('sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(''));
});

// -------------------------------------
//   Task: minify-css
// -------------------------------------
gulp.task('minify-css', ['sass'], function() {
  return gulp.src('style.css')
	.pipe(sourcemaps.init())
	.pipe(cleanCSS({compatibility: '*'}))
	.pipe(cleanCSS({debug: true}, function(details) {
	    console.log(details.name + ' size : ' + details.stats.originalSize);
	    console.log(details.name + ' size : ' + details.stats.minifiedSize);
	}))
	.pipe(sourcemaps.write('/'))
	.pipe(gulp.dest(''))
	.pipe(notify({ message: 'Compiled & Minified CSS complete' }));
});

// -------------------------------------
//   Task: build-js
// -------------------------------------
gulp.task('build-js', function() {
	var debitScripts = gulp.src(['js/*.js'])
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(concat('debit-scripts.js'))
		.pipe(gulp.dest(''))
		.pipe(rename({ suffix: '.min' }))
		.pipe(uglify())
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest(''))
		.pipe(notify({ message: 'Scripts task complete' }));
	return debitScripts;
});

// -------------------------------------
//   Task: watch
// -------------------------------------
gulp.task('watch', function() {
	gulp.watch('js/*.js', ['build:js']);
	gulp.watch('sass/**/*.scss', ['minify-css']);
});