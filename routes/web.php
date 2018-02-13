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
    return view('admin.index');
});

Route::group(['prefix'=>'test'], function () {
    Route::group(['prefix'=>'admin'], function () {
        Route::get('/', ['as'=>'admin.index','uses'=>'DashboardController@show']);
        Route::get('/signin', ['as'=>'admin.signin','uses'=>'DashboardController@signin']);
        Route::get('/signup', ['as'=>'admin.signup','uses'=>'DashboardController@signup']);
        Route::get('/404', ['as'=>'admin.error404','uses'=>'DashboardController@error404']);
        Route::group(['prefix'=>'user'], function() {
            Route::get('/add', ['as'=>'admin.user.add','uses'=>'UserController@add']);
        });
    });
    
});
