'use strict';

const   gulp    = require('gulp'),
        sass    = require('gulp-sass'),
        cssmin  = require('gulp-cssnano'),
        rename  = require('gulp-rename'),
        prefix  = require('gulp-autoprefixer');

const sassOptions = {
    outputStyle: 'expanded'
};

const prefixOptions = {
    browsers: ['last 2 versions']
}

function styles() {
    return gulp.src('assets/sass/main.scss')
        .pipe(sass(sassOptions))
        .pipe(prefix(prefixOptions))
        .pipe(rename('main.css'))
        .pipe(gulp.dest('assets/css'))
        .pipe(cssmin())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/css'))
}

function watch() {
    gulp.watch('assets/sass/**/*.scss', styles)
}

gulp.task('default', watch);
