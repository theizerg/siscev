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
 

mix.styles([
    
    
    'node_modules/@mdi/font/css/materialdesignicons.css',
    'node_modules/otika/assets/bundles/datatables/datatables.min.css',
    'node_modules/otika/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',

    'node_modules/@dlghq/pace-progress/themes/blue/pace-theme-minimal.css',
    'node_modules/otika/assets/bundles/bootstrap-daterangepicker/daterangepicker.css',
    'node_modules/otika/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
    'node_modules/otika/assets/bundles/jquery-selectric/selectric.css',
    'node_modules/otika/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css',
    'node_modules/otika/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
    'node_modules/otika/assets/bundles/select2/dist/css/select2.min.css',

    'node_modules/admin-lte/dist/css/adminlte.min.css',
    ], 'public/css/app.css');


mix.scripts([
    'node_modules/admin-lte/plugins/jquery/jquery.min.js',
    'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'node_modules/otika/assets/bundles/apexcharts/apexcharts.min.js',
    'node_modules/otika/assets/bundles/datatables/datatables.min.js',
    'node_modules/otika/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/dataTables.buttons.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/buttons.flash.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/jszip.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/pdfmake.min.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/vfs_fonts.js',
    'node_modules/otika/assets/bundles/datatables/export-tables/buttons.print.min.js',
    'node_modules/otika/assets/bundles/cleave-js/dist/cleave.min.js',
    'node_modules/otika/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js',
    'node_modules/otika/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js',
    'node_modules/otika/assets/bundles/bootstrap-daterangepicker/daterangepicker.js',
    'node_modules/otika/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
    'node_modules/otika/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
    'node_modules/otika/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
    'node_modules/otika/assets/bundles/select2/dist/js/select2.full.min.js',
    'node_modules/otika/assets/bundles/jquery-selectric/jquery.selectric.min.js',
    'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'node_modules/admin-lte/plugins/jquery-validation/jquery.validate.min.js',
    'node_modules/admin-lte/plugins/jquery-validation/additional-methods.min.js',
    'node_modules/admin-lte/dist/js/adminlte.min.js',,

], 'public/js/app.js');


mix.sass('resources/sass/app.scss', 'public/css/some.css')
mix.js( 'resources/js/app.js', 'public/js/some.js');
