const { mix } = require('laravel-mix');

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

mix.sass('resources/assets/scss/style.scss', 'public/assets/css');

let kube_scripts = [
    "resources/assets/kube/_js/Core/Kube.js",
    "resources/assets/kube/_js/Core/Kube.Plugin.js",
    "resources/assets/kube/_js/Core/Kube.Animation.js",
    "resources/assets/kube/_js/Core/Kube.Detect.js",
    "resources/assets/kube/_js/Core/Kube.FormData.js",
    "resources/assets/kube/_js/Core/Kube.Response.js",
    "resources/assets/kube/_js/Core/Kube.Utils.js",
    "resources/assets/kube/_js/Message/Kube.Message.js",
    "resources/assets/kube/_js/Sticky/Kube.Sticky.js",
    "resources/assets/kube/_js/Toggleme/Kube.Toggleme.js",
    "resources/assets/kube/_js/Offcanvas/Kube.Offcanvas.js",
    "resources/assets/kube/_js/Collapse/Kube.Collapse.js",
    "resources/assets/kube/_js/Dropdown/Kube.Dropdown.js",
    "resources/assets/kube/_js/Tabs/Kube.Tabs.js",
    "resources/assets/kube/_js/Modal/Kube.Modal.js"
];

let pickadate_scripts = [
    "resources/assets/pickadate/compressed/picker.js",
    "resources/assets/pickadate/compressed/picker.date.js",
];

let pickadate_css = [
    "resources/assets/pickadate/compressed/themes/default.css",
    "resources/assets/pickadate/compressed/themes/default.date.css",
];

mix.scripts(kube_scripts, 'public/assets/js/kube.js');
mix.scripts(pickadate_scripts, 'public/assets/js/datepicker.js');
mix.styles(pickadate_css, 'public/assets/css/datepicker.css');