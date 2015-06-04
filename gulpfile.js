var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('css', function() {
	return gulp.src(['resources/assets/less/app.less'])
		.pipe(less())
		.pipe(minifycss())
		.pipe(concat('app.css'))
		.pipe(gulp.dest('public/assets/'));
});

gulp.task('js', function() {
	return gulp.src([
			'resources/assets/js/jquery.min.js',
            'resources/assets/js/rails.js',
			'resources/assets/bootstrap/dist/js/bootstrap.min.js',
			'resources/assets/plupload-2.1.4/js/moxie.min.js',
			'resources/assets/plupload-2.1.4/js/plupload.min.js',
			'resources/assets/js/upload.js',
			'resources/assets/js/app.js'
		])
		.pipe(uglify())
		.pipe(concat('app.js'))
		.pipe(gulp.dest('public/assets/'));
});

gulp.task('default', function() {
	gulp.watch('resources/assets/**/*.less', ['css']);
	gulp.watch('resources/assets/js/*.js', ['js']);
});