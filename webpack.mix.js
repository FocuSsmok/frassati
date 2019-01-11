const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/page/app.js", "public/js/page").sass(
    "resources/sass/page/app.scss",
    "public/css/page/"
);

mix.js("resources/js/dashboard/app.js", "public/js/dashboard").sass(
    "resources/sass/dashboard/app.scss",
    "public/css/dashboard/"
);

mix.browserSync({
    proxy: "localhost:8000"
});
