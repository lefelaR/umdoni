const gulp = require('gulp');
const minifyCSS = require('gulp-clean-css');
const minifyJS = require('gulp-uglify');
const rename = require('gulp-rename');

// Task to minify CSS files
gulp.task('minify-css', function () {
    return gulp.src(
        'public/assets/css/*.css',
        'public/themes/mazor/assets/css/pages/*.css',
        'public/themes/mazor/assets/css/widgets/*.css',
        'public/themes/mazor/assets/css/*.css'
    )
        .pipe(minifyCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('public/assets/dist/css'));
});

// Task to minify JavaScript files
gulp.task('minify-js', function () {
    return gulp.src('public/assets/js/*.js',
        'public/themes/mazor/assets/js/pages/*.js',
        'public/themes/mazor/assets/js/*.js'
    )
        .pipe(minifyJS())

        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('public/assets/dist/js'));
});

// Default task
gulp.task('default', gulp.parallel('minify-css', 'minify-js'));