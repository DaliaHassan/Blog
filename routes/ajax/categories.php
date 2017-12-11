<?php

Route::group( [ 'prefix' => 'categories', 'as' => 'categories.' ], function () {
    Route::get( '/', [ 'as' => 'index', 'uses' => 'CategoryController@index' ] );
} );