'use strict';
var gulp = require('gulp'),
        plugins = require('gulp-load-plugins')(),
        mains = require('main-bower-files');
var paths = {
    dist: {
        js: './web/dist/js/',
        css: './web/dist/css/',
        fonts: './web/dist/fonts/'
    },
    src: {
        less : './src/HandMadeBundle/Resources/public/less/app.less'
    },
    bower: './bower_components/',
    npm: './node_modules/',
    font: './bower_components/bootstrap/dist/fonts/*'
};
/**
 * VENDOR tasks
 */
gulp.task('vendor:css', function() {
    var filter = plugins.filter('*.css');
    return gulp.src(mains())
            .pipe(filter)
            .pipe(plugins.concatCss('vendor.min.css'))
            .pipe(plugins.sourcemaps.init())
            .pipe(plugins.minifyCss({keepSpecialComments: 0}))
            .pipe(plugins.sourcemaps.write('.'))
            .pipe(gulp.dest(paths.dist.css));
});
gulp.task('vendor:js', function() {
    var filter = plugins.filter('*.js');
    return gulp.src(mains())
            .pipe(filter)
            .pipe(plugins.sourcemaps.init())
            .pipe(plugins.concat('vendor.min.js'))
            .pipe(plugins.uglify())
            .pipe(plugins.sourcemaps.write('.'))
            .pipe(gulp.dest(paths.dist.js));
});
gulp.task('vendor:fonts', function() {
    return gulp.src(paths.font)
           .pipe(gulp.dest(paths.dist.fonts));
});

gulp.task('vendor', [
    'vendor:js',
    'vendor:css'
], function() {
    gulp.src('')
            .pipe(plugins.notify('task VENDOR is completed'));
});
gulp.task('app-less', function() {
    gulp.src(paths.src.less)
        .pipe(plugins.less())
        .pipe(plugins.minifyCss())
        .pipe(plugins.rename('app.min.css'))
        .pipe(gulp.dest(paths.dist.css));
});
