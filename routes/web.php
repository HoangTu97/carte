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
        Route::get('/', ['as'=>'admin.index','uses'=>'DashboardController@index']);
    });
});