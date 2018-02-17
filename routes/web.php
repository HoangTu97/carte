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
    return view('admin.pages.index');
});

Route::group(['prefix'=>'admin'], function () {
    Route::get('/', ['as'=>'admin.index','uses'=>'DashboardController@show']);
    Route::get('/signin', ['as'=>'admin.signin','uses'=>'DashboardController@signin']);
    Route::get('/signup', ['as'=>'admin.signup','uses'=>'DashboardController@signup']);
    Route::get('/404', ['as'=>'admin.error404','uses'=>'DashboardController@error404']);
    Route::group(['prefix'=>'user'], function() {
        Route::get('/add', ['as'=>'admin.user.add','uses'=>'UserController@add']);
        Route::get('/list', ['as'=>'admin.user.list','uses'=>'UserController@list']);
        Route::get('/edit', ['as'=>'admin.user.edit','uses'=>'UserController@edit']);
    });
    Route::group(['prefix'=>'restaurant'], function() {
        Route::get('/add', ['as'=>'admin.restaurant.add','uses'=>'RestaurantController@add']);
        Route::get('/list', ['as'=>'admin.restaurant.list','uses'=>'RestaurantController@list']);
        Route::get('/edit', ['as'=>'admin.restaurant.edit','uses'=>'RestaurantController@edit']);
    });
});
