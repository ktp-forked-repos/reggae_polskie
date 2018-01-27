var gulp                = require('gulp'),
    less                = require('gulp-less'),
    cssmin              = require('gulp-cssmin'),
    rename              = require('gulp-rename'),
    sourceMap           = require('gulp-sourcemaps');

gulp.task('watch', function () {
    gulp.watch('app/res/css/*.css', ['build_css_map']);
    gulp.watch('app/res/less/*.less', ['less']);
});

gulp.task('less', function () {

    return gulp.src(
        [
            'app/res/less/main-style.less',
            'app/res/less/colorbox.less',
            'app/res/less/toolbar.less'
        ]
        )
        .pipe(less().on('error', function (err) {
            console.log(err);
        }))
        .pipe(cssmin().on('error', function (err) {
            console.log(err);
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('app/res/css/'));
});

gulp.task('build_css_map', function(){
    return gulp.src('app/res/css/*.css')
        .pipe(sourceMap.init())
        .pipe(sourceMap.write('.'))
        .pipe(gulp.dest('app/res/css/'));
});

gulp.task('default', [ 'watch', 'build_css_map', 'less']);