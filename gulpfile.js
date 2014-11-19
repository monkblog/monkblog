var gulp = require( 'gulp' );
var sass = require( 'gulp-ruby-sass' );

gulp.task( 'scss', function() {
    return gulp.src( 'scss/main.scss' )
        .pipe( sass() )
        .pipe( gulp.dest( 'public/css' ) );
});

gulp.task( 'watch', function() {
    gulp.watch( 'scss/*.scss', [ 'scss' ] );
});

gulp.task( 'default', [ 'scss' ], function() {

});
