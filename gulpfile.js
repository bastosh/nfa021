const plugins       = require('gulp-load-plugins');
const yargs         = require('yargs');
const gulp          = require('gulp');
const rimraf        = require('rimraf');
const yaml          = require('js-yaml');
const fs            = require('fs');
const named         = require('vinyl-named');
const webpack       = require('webpack');
const webpackStream = require('webpack-stream');
const autoprefixer  = require('autoprefixer');

// Load all Gulp plugins into $
const $ = plugins();

// Check for --production flag in npm script
const PRODUCTION = !!(yargs.argv.production);

// Load settings from settings.yml
const { COMPATIBILITY, PATHS } = loadConfig();

let webpackConfig = {
    mode: (PRODUCTION ? 'production' : 'development'),
    module: {
        rules: [
            {
                test: /\.js$/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [ "@babel/preset-env" ],
                        compact: false
                    }
                }
            }
        ]
    },
    devtool: !PRODUCTION && 'source-map'
};


/*
|--------------------------------------------------------------------------
| Tasks
|--------------------------------------------------------------------------
*/

// Build the site
gulp.task('build', gulp.series(clean, javascript, sassFront, sassBack));

// Build the site and watch for changes
gulp.task('default', gulp.series('build', watch));


/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
*/

function loadConfig() {
    let ymlFile = fs.readFileSync('config.yml', 'utf8');
    return yaml.load(ymlFile);
}

// Delete the "css" folder every time a build starts
function clean(done) {
    rimraf(PATHS.dist + '/assets/css', done);
}

// Compile Sass into CSS
// In production, the CSS is compressed and optimized
function sassFront() {

    const postCssPlugins = [
        autoprefixer({ browsers: COMPATIBILITY }),
    ];

    return gulp.src('src/assets/scss/app.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            includePaths: PATHS.sass
        }).on('error', $.sass.logError))
        .pipe($.postcss(postCssPlugins))
        .pipe($.if(PRODUCTION, $.cleanCss()))
        .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
        .pipe(gulp.dest(PATHS.dist + '/assets/css'));
}

function sassBack() {

    const postCssPlugins = [
        autoprefixer({ browsers: COMPATIBILITY }),
    ];

    return gulp.src('src/assets/scss/admin.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            includePaths: PATHS.sass
        }).on('error', $.sass.logError))
        .pipe($.postcss(postCssPlugins))
        .pipe($.if(PRODUCTION, $.cleanCss()))
        .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
        .pipe(gulp.dest(PATHS.dist + '/assets/css'));
}

// Combine JavaScript into one file
// In production, the file is minified
function javascript() {
    return gulp.src(PATHS.entries)
        .pipe(named())
        .pipe($.sourcemaps.init())
        .pipe(webpackStream(webpackConfig, webpack))
        .pipe($.if(PRODUCTION, $.uglify().on('error', e => { console.log(e); })))
        .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
        .pipe(gulp.dest(PATHS.dist + '/assets/js'));
}

/*
|--------------------------------------------------------------------------
| Watch
|--------------------------------------------------------------------------
*/

// Watch for changes
function watch() {
    gulp.watch('src/assets/scss/**/*').on('all', gulp.series(sassFront, sassBack));
}
