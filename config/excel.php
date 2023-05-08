<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Export Format
    |--------------------------------------------------------------------------
    |
    | This option controls the default export format used by the package.
    |
    | Supported formats: xls, xlsx, csv, ods, html, pdf
    |
    */

    'default_export_format' => 'xlsx',

    /*
    |--------------------------------------------------------------------------
    | Temporary Path
    |--------------------------------------------------------------------------
    |
    | This option specifies the path where temporary files will be stored
    | during the export process. Make sure the path is writable by the
    | web server process. A relative path will be relative to the
    | root directory of your Laravel installation.
    |
    */

    'temp_path' => storage_path('app/excel'),

    /*
    |--------------------------------------------------------------------------
    | Date Format
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify the default date format used for
    | exporting dates to Excel. You can use any PHP date format string.
    |
    */

    'date_format' => 'Y-m-d',
];
