<?php

Route::resource('users', 'UserController');
Route::resource('comments', 'CommentController');
Route::get('articles/', 'UserController@index');
