'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

var paths = {
    styles: {
        src: "./sass/**/*.scss",
        comp: "./sass/esplanade-brand-base.scss",
        dest: "./wp-content/themes/esplanade-child/css/"
    }
};


gulp.task('workflow', function () {
    return gulp
        .src(paths.styles.comp)
        .pipe(sass())
        .on("error", sass.logError)
        .pipe(gulp.dest(paths.styles.dest));
});

gulp.task('default', function () {
    gulp.series('workflow');
 
    gulp.watch(paths.styles.src, gulp.series('workflow'));
});
