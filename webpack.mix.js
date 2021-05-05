const mix = require('laravel-mix');
mix
    /* CSS Backend*/
    .sass('resources/sass/main.scss', 'public/css/app.css')
    .sass('resources/sass/codebase/themes/corporate.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/earth.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/elegance.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/flat.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/pulse.scss', 'public/css/themes/')

    /* JS Backend*/
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .js('resources/js/app.js', 'public/js/laravel.app.js')
    // .js('resources/js/codebase/app.js', 'public/js/codebase.app.js')

    /* CSS Frontend */
    .js('resources/js/pages/tables_datatables.js', 'public/js/pages/tables_datatables.js')

    /* Tools */
    .browserSync('localhost:8000')
    .disableNotifications()

    /* Options */
    .options({
        processCssUrls: false
});
