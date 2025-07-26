const { src, dest, watch, parallel, series } = require('gulp');
const sass = require('gulp-sass')(require('sass')); // ✅ Dart Sass actualizado
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser'); // ✅ Reemplazado gulp-terser-js
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const notify = require('gulp-notify');
const newer = require('gulp-newer'); // ✅ Alternativa más estable a gulp-cache
const webp = require('gulp-webp');

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*',
    imgOutput: 'build/img'
}

// Compilar SCSS a CSS con PostCSS, autoprefixer y cssnano
function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./build/css'));
}

// Unificar, minificar y generar sourcemaps del JS
function javascript() {
    return src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./build/js'));
}

// Optimizar imágenes solo si son nuevas
function imagenes() {
    return src(paths.imagenes)
        .pipe(newer(paths.imgOutput))
        .pipe(imagemin({ optimizationLevel: 3 }))
        .pipe(dest(paths.imgOutput))
        .pipe(notify({ message: '✅ Imagen optimizada' }));
}

// Convertir a formato WebP solo si son nuevas
function versionWebp() {
    return src(paths.imagenes)
        .pipe(newer({ dest: paths.imgOutput, ext: '.webp' }))
        .pipe(webp())
        .pipe(dest(paths.imgOutput))
        .pipe(notify({ message: '✅ Imagen convertida a WebP' }));
}

// Vigilar cambios en archivos y ejecutar tareas correspondientes
function watchArchivos() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, imagenes);
    watch(paths.imagenes, versionWebp);
}

// Tareas agrupadas
exports.css = css;
exports.javascript = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.watch = watchArchivos;

// Tareas compuestas
exports.build = parallel(css, javascript, imagenes, versionWebp);
exports.dev = series(exports.build, watchArchivos);

// Tarea por defecto al ejecutar `gulp`
exports.default = exports.dev;
