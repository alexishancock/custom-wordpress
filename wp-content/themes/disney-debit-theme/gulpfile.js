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
watch      = require('gulp-watch'),
rename     = require('gulp-rename'),
uglify     = require('gulp-uglify'),
notify     = require('gulp-notify'),
sourcemaps = require('gulp-sourcemaps'),
svgSprite    = require('gulp-svg-sprite'),
plumber      = require('gulp-plumber');     // for gulp-svg-sprite

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
	var debitScripts = gulp.src(['js/src/*.js'])
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(concat('debit-scripts.js'))
		.pipe(gulp.dest('js'))
		.pipe(rename({ suffix: '.min' }))
		.pipe(uglify())
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest('js'))
		.pipe(notify({ message: 'Scripts task complete' }));
	return debitScripts;
});

// -------------------------------------
//   Task: watch
// -------------------------------------
gulp.task('watch', function() {
	gulp.watch('js/src/*.js', ['build-js']);
	gulp.watch('sass/**/*.scss', ['minify-css']);
});

// -------------------------------------
//   Task: create SVG sprite
// -------------------------------------

var baseDir      = 'svg',   // <-- Set to your SVG base directory
svgGlob      = '*.svg',       // <-- Glob to match your SVG files
outDir       = '',     // <-- Main output directory
config       = {
    "dest": "svg",
    "mode": {
        "css": {
        	"sprite": "../sprite.css.svg",
            "render": {
                "scss": {
                	"dest": "../sass/elements/_sprite.scss"
                }
            }
        },
        // "defs": {
        // 	"sprite": "../sprite.defs.svg"
        // }
        // "symbol": true
    }
};

gulp.task('svgsprite', function() {
    return gulp.src(svgGlob, {cwd: baseDir})
        .pipe(plumber())
        .pipe(svgSprite(config)).on('error', function(error){ console.log(error); })
        .pipe(gulp.dest(outDir))
});
