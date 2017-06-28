var gulp = require('gulp');
var $    = require('gulp-load-plugins')();


// to add extra paths from CSS frameworks
// this is empty because there are no CSS frameworks supporting this site 
var sassPaths = [];

gulp.task('sass', function() {
  return gulp.src('sites/all/themes/open_charity/scss/app.scss')
	.pipe($.sass({
	  includePaths: sassPaths
	})
	  .on('error', $.sass.logError))
	.pipe($.autoprefixer({
	  browsers: ['last 2 versions', 'ie >= 9']
	}))
	.pipe(gulp.dest('sites/all/themes/open_charity/css'));
});

gulp.task('default', ['sass'], function() {
	// watching scss files for changes
	gulp.watch(['sites/all/themes/open_charity/scss/**/*.scss'], ['sass']);
});


// CANNOT FIND NODE MODULES AND FOLDER -> LOOK FOR THESE