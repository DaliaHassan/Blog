<?php

Route::resource('articles', 'ArticleController');
Route::get('articles/delete/{id}', ['as' => 'articles.delete', 'uses' => 'ArticleController@destroy']);
Route::get('articles/showComments/{id}', ['as' => 'articles.showComments', 'uses' => 'ArticleController@show']);
Route::get('articles/publish/{id}', ['as' => 'articles.publish', 'uses' => 'ArticleController@publish']);
Route::get('articles/unpublish/{id}', ['as' => 'articles.unpublish', 'uses' => 'ArticleController@unpublish']);