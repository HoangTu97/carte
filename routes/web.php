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
    $locations = DB::table('location')->whereNull('latitude')->select('id_rest','address','latitude')->get();
        // Google api keys
        $api_keys = array(
                    env('GOOGLE_API_KEY', 'AIzaSyD5_8b7XGLJ_665C2Og6YV8Two7XOPN4h8'),
                    env('GOOGLE_API_KEY_2', 'AIzaSyAIKAChlwMHxXoIW95UdgDmU5cQy23Zi8o'),
                    env('GOOGLE_API_KEY_3', 'AIzaSyA7Dxr163l0sH-gBMCGhU4T4XgKNYN-pYA'),
                    env('GOOGLE_API_KEY_4', 'AIzaSyD164wJgRiJnqXZ87m6MRutlq1qYzu8DL8')
        );

        $api_key_i = 0;
        foreach($locations as $loc) {
            // check null null position for not request all 
            if ($loc->address && !$loc->latitude) {
                $statusSuccess = false;
                while(!$statusSuccess) {
                    $queryString = "https://maps.googleapis.com/maps/api/geocode/json"."?address=".urlencode($loc->address)."&key=".$api_keys[$api_key_i];
                    print("Address: " . $loc->address . " | " . $loc->latitude . '<br/>');
                    print("Query: ".$queryString . "<br/>");
                    $geo_locat = json_decode(file_get_contents($queryString), true);

                    if ($geo_locat['status'] == 'OVER_QUERY_LIMIT') {
                        $api_key_i++;
                    } elseif ($geo_locat['status'] == 'ZERO_RESULTS') {
                        $statusSuccess = true;
                    } elseif ($geo_locat['status'] == 'OK') {
                        $statusSuccess = true;
                        DB::table('location')
                            ->where('id_rest', $loc->id_rest)
                            ->update([
                                'latitude'=>$geo_locat['results'][0]['geometry']['location']['lat'],
                                'longitude'=>$geo_locat['results'][0]['geometry']['location']['lng']
                            ]);
                    }
                    echo $geo_locat['status'] . '<br/>';
                }
            }
        }
});