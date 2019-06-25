<?php

/*
|--------------------------------------------------------------------------
| Routes Thecaoapi
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Thecaoapi\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    /**
     * Group route admin.
     */
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('thecaoapi', 'ThecaoapiController');

        Route::prefix('thecaoapi')->group(function () {
            Route::post('get_list_thecaoapi', 'ThecaoapiController@getListThecaoapi')->name('thecaoapi.getListThecaoapi');
        });
    });

    /**
     * Group route customer.
     */
    Route::group(['prefix' => 'home'], function () {
        Route::get('thecaoapi', 'ThecaoapiController@home')->name('thecaoapi.home');
    });

});



