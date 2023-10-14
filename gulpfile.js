const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');


// Compilar SASS por medio de gulp
function css(done) {

    src("src/scss//**/*.scss") // Identificar el archivo SASS
        .pipe(plumber()) // en caso de errores no detiene workflow
        .pipe(sass ()) // compilar sass
        .pipe(dest("build/css")); // Almacenar el css complilado en el disco duro

    done(); // callback
}

function dev(done) {

    watch("src/scss/**/*.scss", css);

    done();
}

exports.css = css;
exports.dev = dev;