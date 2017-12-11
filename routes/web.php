<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect(route('admin.articles.index'));
});

Route::group(['namespace' => 'Admin'], function() {
    Route::group(['namespace' => 'Auth'], function(){
        Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
        Route::post('/login', ['as' => 'postlogin', 'uses' => 'LoginController@login']);
        Route::post('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    });
});


Route::group([ 'prefix' => 'admin', 'as'  => 'admin.', 'namespace' => 'Admin'
], function () {
    require_once 'admin/categories.php';
    require_once 'admin/articles.php';

});

Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function() {
    require_once 'ajax/categories.php';
    require_once 'ajax/articles.php';
    require_once 'ajax/users.php';

});

Route::group([ 'prefix' => 'web', 'as'  => 'web.', 'namespace' => 'Web'], function () {
    require_once 'web/users.php';

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
