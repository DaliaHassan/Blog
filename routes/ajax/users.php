<?php

Route::group( [ 'prefix' => 'users', 'as' => 'users.' ], function () {
    Route::get( '/', [ 'as' => 'index', 'uses' => 'UserController@index' ] );
} );