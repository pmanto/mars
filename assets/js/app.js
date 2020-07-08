/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
// any CSS you import will output into a single css file (app.css in this case)
require('../css/app.scss');
console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
// loads the jquery package from node_modules
window.jQuery = require('jquery');
window.$ = window.jQuery;
require('bootstrap');
window.moment = require('moment');
require('tempusdominus-bootstrap-4');
require('@fortawesome/fontawesome-free/js/all.js');
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    $('.date').datetimepicker({
        format: 'DD-MM-YYYY H:mm',
        useCurrent: true
    });

});
