'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var uglify = require('gulp-uglify');

gulp.task('sass', function () {
	gulp.src('./resources/assets/scss/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('./resources/assets/css'));
});

gulp.task('minify-css', function() {
	return gulp.src('./resources/assets/css/*.css')
		.pipe(minifyCss({compatibility: 'ie8'}))
		.pipe(gulp.dest('./public/assets/css'));
});

gulp.task('compress', function() {
	return gulp.src('./resources/assets/js/*.js')
		.pipe(uglify())
		.pipe(gulp.dest('./public/assets/js'));
});

gulp.task('watch', function () {
	gulp.watch('./resources/assets/scss/*.scss', ['sass']);
	gulp.watch('./resources/assets/css/*.css', ['minify-css']);
	gulp.watch('./resources/assets/js/*.js', ['compress']);
});

gulp.task('default', ['sass', 'minify-css', 'compress', 'watch']);