const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


// mix.copyDirectory('node_modules/tui-calendar', 'public/tui-calendar');
// mix.copyDirectory('node_modules/tui-code-snippet', 'public/tui-code-snippet');
// mix.copyDirectory('node_modules/tui-date-picker', 'public/tui-date-picker');
// mix.copyDirectory('node_modules/tui-dom', 'public/tui-dom');
// mix.copyDirectory('node_modules/tui-time-picker', 'public/tui-time-picker');
// mix.copy('node_modules/tui-calendar/dist/tui-calendar.js', 'public/js/tui-calendar.js');
// mix.copy('node_modules/tui-calendar/dist/tui-calendar.css', 'public/css/tui-calendar.css');
// mix.copy('node_modules/tui-date-picker/dist/tui-date-picker.css', 'public/css/tui-date-picker.css');
// mix.copy('node_modules/tui-time-picker/dist/tui-time-picker.css', 'public/css/tui-time-picker.css');
