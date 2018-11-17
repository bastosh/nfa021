let gulp          = require('gulp');
let $             = require('gulp-load-plugins')();
let autoprefixer  = require('autoprefixer');

let sassPaths = [
    'node_modules/foundation-sites/scss',
    'node_modules/motion-ui/src'
];

function sass() {
    return gulp.src('src/scss/app.scss')
        .pipe($.sass({
            includePaths: sassPaths,
            outputStyle: 'compressed'
        })
            .on('error', $.sass.logError))
        .pipe($.postcss([
            autoprefixer({ browsers: ['last 2 versions', 'ie >= 9'] })
        ]))
        .pipe(gulp.dest('public/css'))
}

gulp.task('sass', sass);