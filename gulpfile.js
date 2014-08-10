
var gulp       = require('gulp'),
	compass    = require('gulp-compass'),
    minifyCSS  = require('gulp-minify-css'),
    browserify = require('gulp-browserify'),
    jshint     = require('gulp-jshint'),
    concat     = require('gulp-concat'),
    livereload = require('gulp-livereload'),
    coffeeify  = require('gulp-coffeeify');

var paths = {
	scss: './web/assets/src/scss',
	css_compiled: './web/assets/css',
	js_compiled: '.web/assets/js',
	js: './web/assets/src/js',
	coffee: './web/assets/src/coffee/*.coffee',
	img: './web/assets/img'
}

var jsFile = 'app.js';

gulp.task('compass', function() {
  gulp.src(paths.scss + '/**/*.scss')
  .pipe(compass({
    css: paths.css_compiled,
    sass: paths.scss,
    image: paths.img
  }))
  .on('error', function(err) {
  		console.log(err);
   })
  .pipe(minifyCSS())
  .pipe(gulp.dest('web/assets/tmp'))
  .pipe(livereload());
});

gulp.task('browserify', function() {
    gulp.src([paths.js+ '/**/*.js'])
        .pipe(browserify({
          insertGlobals : true,
          debug : true
        }))
        .pipe(concat(jsFile))
        .pipe(gulp.dest(paths.js_compiled + jsFile))
        .pipe(livereload({ auto: false }));
});

gulp.task('coffee', function() {
    gulp.src(paths.coffee)
        .pipe(coffeeify())
        .pipe(gulp.dest('./web/assets/js'));
});

gulp.task('lint', function() {
  gulp.src(paths.js + '/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
    .pipe(livereload({ auto: false }));
});

gulp.task('watch', function() {
	  livereload.listen();
    gulp.watch(paths.sass, ['compass']);
    gulp.watch(paths.js + '/**/*.js', ['lint']);
});

gulp.task('default', ['compass', 'lint']);