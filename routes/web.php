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
    return view('index');
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {
    Route::get('/', ['as'=>'admin.index','uses'=>'DashboardController@show']);
    Route::get('/signin', ['as'=>'admin.signin','uses'=>'DashboardController@signin']);
    Route::get('/signup', ['as'=>'admin.signup','uses'=>'DashboardController@signup']);
    Route::get('/404', ['as'=>'admin.error404','uses'=>'DashboardController@error404']);
    Route::group(['prefix'=>'user'], function() {
        Route::get('/add', ['as'=>'admin.user.add','uses'=>'UserController@add']);
        Route::get('/list', ['as'=>'admin.user.list','uses'=>'UserController@list']);
        Route::get('/edit/{id}', ['as'=>'admin.user.edit','uses'=>'UserController@edit']);
        Route::get('/delete/{id}', ['as'=>'admin.user.delete','uses'=>'UserController@delete']);
        Route::get('/view/{id}', ['as'=>'admin.user.view','uses'=>'UserController@view']);
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
    Route::group(['prefix'=>'categorie'], function() {
        Route::get('/add', ['as'=>'admin.cate.add', 'uses'=>'CategoryController@add']);
        Route::post('/add', ['uses'=>'CategoryController@postAdd']);
        Route::get('/list', ['as'=>'admin.cate.list', 'uses'=>'CategoryController@list']);
        Route::get('/edit/{id}', ['as'=>'admin.cate.edit', 'uses'=>'CategoryController@edit']);
        Route::post('/edit/{id}', ['uses'=>'CategoryController@postEdit']);
        Route::get('/delete/{id}', ['as'=>'admin.cate.delete', 'uses'=>'CategoryController@delete']);
        Route::get('/view/{id}', ['as'=>'admin.cate.view', 'uses'=>'CategoryController@view']);
    });
});

Route::get('login', ['as'=>'login', 'uses'=>'UserController@getLogin']);
Route::post('login', ['uses'=>'UserController@postLogin']);
Route::get('register', ['as'=>'register', 'uses'=>'UserController@getRegister']);
Route::post('register', ['uses'=>'UserController@postRegister']);
Route::get('logout', ['as'=>'logout','uses'=>'UserController@logout']);