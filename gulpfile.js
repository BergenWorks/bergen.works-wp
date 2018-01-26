'use strict';

const   gulp        = require('gulp'),
        browserSync = require('browser-sync'),
        wait        = require('gulp-wait'),
        sass        = require('gulp-sass'),
        cssmin      = require('gulp-cssnano'),
        rename      = require('gulp-rename'),
        prefix      = require('gulp-autoprefixer'),
        uglify      = require('gulp-uglify');

const sassOptions = {
    outputStyle: 'expanded',
    includePaths: ['assets/scss']
};

const prefixOptions = {
    browsers: ['last 2 versions']
}

gulp.task('styles', function(){
    return gulp.src('./assets/sass/main.scss')
        .pipe(wait(500))
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(prefix(prefixOptions))
        .pipe(gulp.dest('assets/css'))
        .pipe(cssmin())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.reload({stream: true}))
});

gulp.task('scripts', function(){
    return gulp.src('./assets/js/core.js')
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./assets/js'))
});

gulp.task('bs-reload', function(){
    return browserSync.reload()
})

gulp.task('serve', function(){
    browserSync.init({
        proxy: 'http://localhost',
        port: 80,
        browser: 'chrome'
    });

    gulp.watch('assets/sass/**/*.scss', ['styles']);
    gulp.watch('./assets/js/**/*.js', ['scripts', 'bs-reload'] );
});

gulp.task('default', ['serve']);
