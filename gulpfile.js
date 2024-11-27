const gulp = require('gulp');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');

// Minify Main JS.
gulp.task('scripts', function () {
	return gulp.src('assets/js/main.js')
		.pipe(concat('main.min.js'))
		.pipe(uglify())
		.on('error', function (error) {
			console.error('Error in scripts task', error.toString());
		})
		.pipe(gulp.dest('assets/js'));
});

// Minify Styles CSS.
gulp.task('styles', function () {
	return gulp.src('assets/css/style.css')
		.pipe(concat('style.min.css'))
		.pipe(cleanCSS())
		.on('error', function (error) {
			console.error('Error in styles task', error.toString());
		})
		.pipe(gulp.dest('assets/css'));
});

// Default Task.
gulp.task('default', gulp.parallel('scripts', 'styles'));
