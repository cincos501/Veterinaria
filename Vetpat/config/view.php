<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most of the time views will be stored in the `resources/views` directory.
    | However, you may configure multiple paths to store your views if needed.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This is the location where all the compiled Blade templates will be stored.
    | You may change this path if you wish to use a different directory.
    |
    */

    'compiled' => storage_path('framework/views'),

];
