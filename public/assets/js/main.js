// @codekit-prepend "require.js"

requirejs.config({
    baseUrl: '/assets/bower_components',
    paths: {
        jquery: 'jquery/dist/jquery.min',
        picker: 'pickadate/lib/compressed/picker',
        picker_it: 'pickadate/lib/compressed/translations/it_IT',
        datepicker: 'pickadate/lib/compressed/picker.date',
        timepicker: 'pickadate/lib/compressed/picker.time',
        selectize: 'selectize/dist/js/standalone/selectize.min',
    },
    shim: {
        picker_it: {
            deps: ['jquery']
        }
    }
});