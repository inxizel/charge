<?php

/*
|--------------------------------------------------------------------------
| Routes Thecaoweb
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Thecaoweb\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    /**
     * Group route admin.
     */
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('thecaoweb', 'ThecaowebController');

        Route::prefix('thecaoweb')->group(function () {
            Route::post('get_list_thecaoweb', 'ThecaowebController@getListThecaoweb')->name('thecaoweb.getListThecaoweb');
        });
    });

    /**
     * Group route customer.
     */
    Route::group(['prefix' => 'home'], function () {
        Route::get('thecaoweb', 'ThecaowebController@home')->name('thecaoweb.home');
    });

});



