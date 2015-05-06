var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('css', function() {
	return gulp.src(['app/assets/less/app.less'])
		.pipe(less())
		.pipe(minifycss())
		.pipe(concat('main.min.css'))
		.pipe(gulp.dest('public/assets/'));
});

gulp.task('js', function() {
	return gulp.src([
			'app/assets/js/jquery.min.js',		
			'app/assets/bootstrap/dist/js/bootstrap.min.js',
			'app/assets/js/app.js'
		])
		.pipe(uglify())
		.pipe(concat('main.min.js'))
		.pipe(gulp.dest('public/assets/'));
});

gulp.task('default', function() {
	gulp.run('css');
	gulp.run('js');
	gulp.watch('app/assets/**/*.less', function() {
		gulp.run('css');
	});
	gulp.watch('app/assets/js/app.js', function() {
		gulp.run('js');
	});
});