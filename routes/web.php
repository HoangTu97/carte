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
        Route::post('/add', ['as'=>'admin.restaurant.postAdd','uses'=>'RestaurantController@postAdd']);
        Route::get('/list', ['as'=>'admin.restaurant.list','uses'=>'RestaurantController@list']);
        Route::get('/edit/{id}', ['as'=>'admin.restaurant.edit','uses'=>'RestaurantController@edit']);
        Route::post('/edit/{id}', ['as'=>'admin.restaurant.postEdit','uses'=>'RestaurantController@postEdit']);
        Route::get('/delete/{id}', ['as'=>'admin.restaurant.delete','uses'=>'RestaurantController@delete']);
        Route::get('/view/{id}', ['as'=>'admin.restaurant.view','uses'=>'RestaurantController@view']);
    });
});


Route::get('/test', function () {
});