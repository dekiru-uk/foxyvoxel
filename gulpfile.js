'use strict';

const autoprefixer = require('autoprefixer');
const browsersync = require('browser-sync').create();
const browserify = require('browserify');
const gulp = require('gulp');
const { src, dest } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cleanCss = require('gulp-clean-css');
const minify = require('gulp-minify');
const concat = require('gulp-concat');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const log = require('gulplog');
const uglify = require('gulp-uglify');
const plumber = require('gulp-plumber');
const groupmq = require('@mozaic-ds/postcss-media-queries-packer-on-demand');
const touch = require('gulp-touch-cmd');


function css() {
  return gulp
    .src('./sass/**/*.scss', { sourcemaps: true })
    .pipe(plumber()) // Prevent termination on error
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded', // Expanded so that our CSS is readable
    })).on('error', sass.logError)
    .pipe(postcss([
      autoprefixer({
        overrideBrowserslist: ['last 2 versions']
      })
    ]))
    // .pipe(sourcemaps.init())
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest('./', { sourcemaps: true }))
    .pipe(browsersync.stream())
    .pipe(touch());
    done();
};

function cssBuild() {
  return gulp
    .src('./sass/style.scss')
    .pipe(sass({includePaths: ['sass']}))
    .pipe(postcss([
      autoprefixer({
        overrideBrowserslist: ['last 2 versions'],
        cascade: false,
      })
    ]))
    .pipe(groupmq())
    .pipe(cleanCss())
    .pipe(minify())
    .pipe(gulp.dest('./'))
    .pipe(touch());
    done();
};

function scripts() {
  return gulp
    .src('./js/*.js', { sourcemaps: true }) // https://gulpjs.com/docs/en/api/src/#sourcemaps
    .pipe(concat('./scripts.min.js'))
    .pipe(uglify())
    .pipe(dest('./js/min/', { sourcemaps: '.' }));
    done();
};

// Transpile, concatenate and minify scripts
function scriptsBuild() {
  var b = browserify({
      entries: './js/main.js',
      debug: false,
    });

    return b.bundle()
      .pipe(source('scripts.min.js'))
      .pipe(plumber()) // Prevent termination on error
      .pipe(buffer())
      .pipe(sourcemaps.init({loadMaps: false}))
          // Add transformation tasks to the pipeline here.
          .pipe(uglify())
          .on('error', log.error)
      .pipe(gulp.dest('./js/min/'))
      .pipe(touch());
}

// BrowserSync
function browserSyncInit(done) {
  browsersync.init({
    proxy: 'http://foxyvoxel.wp/',
    host: 'foxyvoxel.wp',
    open: 'external',
    browser: 'microsoft edge',
    online: true,
    stream: true
  });
}

// BrowserSync Reload
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

// Watch files
function watchFiles() {
  gulp.watch("./sass/**/*", css);
  gulp.watch([
    "./js/**/*",
    "!./js/min/*"
    ], scripts);
  gulp.watch(
    [
      "./*.php",
      "./**/*.php",
      "./sass/**/*",
      "./js/min/*"
    ],
    browsersync.reload()
  );
}

const js = gulp.series(scripts);
const watch = gulp.parallel(watchFiles, browserSyncInit);
const build = gulp.series(cssBuild, scriptsBuild);

exports.css = css;
exports.watch = watch;
exports.js = js;
exports.build = build;
exports.default = watch;
