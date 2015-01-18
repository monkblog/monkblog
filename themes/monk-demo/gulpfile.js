// Get modules
var gulp = require('gulp'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify'),
    bower = require('gulp-bower'),
    compass = require('gulp-compass'),
    imagemin = require('gulp-imagemin'),
    prefix = require('gulp-autoprefixer'),
    concat = require('gulp-concat-sourcemap'),
    yaml = require('js-yaml'),
    fs   = require('fs'),
    path = require('path');

var env = process.env.NODE_ENV,
    themeFile = path.join(__dirname, 'theme.yml' ),
    theme = yaml.safeLoad(fs.readFileSync(themeFile, 'utf8') );

var themeAssets = theme.assets_folder + '/',
    themeCssSrc  =  themeAssets + theme.assets.css_src,
    themeCssOutputFolder = theme.assets.css_outputFolder,
    themeJsSrc  =  themeAssets + theme.assets.js_src,
    themeJsOutputPath = theme.assets.js_outputFolder + theme.assets.js_output;

var errorHandle = function (error) {
    return console.log(error)
};

gulp.task( 'theme' , function() {
    return console.log(theme);
});

// Task JS
gulp.task('js', function () {
    return gulp.src(themeJsSrc)
        .pipe(gulpif(env === 'production', uglify()))
        .pipe(concat(themeJsOutputPath))
        .on('error', errorHandle)
        .pipe(gulp.dest(themeAssets + 'js'));
});

// Task SCSS
gulp.task('scss', function () {
    var style = 'nested';
    var comments = true;

    if(env === 'production') {
        style = 'compressed';
        comments = false;
    }

    return gulp.src(themeCssSrc)
        .pipe(compass({
            project: path.join(__dirname, themeAssets),
            comments: comments,
            style: style,
            sass: 'scss',
            css: themeCssOutputFolder,
            font: 'font',
            image: 'img',
            import_path: 'vendor/foundation/scss'
        }))
        .on('error', errorHandle)
        .pipe(prefix('last 15 version'))
        .pipe(gulp.dest(themeAssets + themeCssOutputFolder));
});

gulp.task('bower', function () {
    return bower();
});

gulp.task('bower-update', function () {
    return bower({ cmd: 'update'});
});

// Task gulp
gulp.task('default', ['scss','js']);