<?php

/*
|--------------------------------------------------------------------------
| Routes Thecao
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Thecao\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    /**
     * Group route admin.
     */
    Route::group(['prefix' => 'admin'], function () {
        
        
        Route::prefix('thecao')->group(function () {
            //Route::get('api','ThecaoController@getListApi')->name('thecao.api');

            
            Route::post('get_list_thecao', 'ThecaoController@getListThecao')->name('thecao.getListThecao');
        });
        Route::resource('thecao', 'ThecaoController');


    });

    /**
     * Group route customer.
     */
    Route::group(['prefix' => 'home'], function () {
        Route::get('thecao', 'ThecaoController@home')->name('thecao.home');
    });

});



