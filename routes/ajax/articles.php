<?php

Route::group( [ 'prefix' => 'articles', 'as' => 'articles.' ], function () {
    Route::get( '/', [ 'as' => 'index', 'uses' => 'ArticleController@index' ] );
} );