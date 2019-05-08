<?php

/*
|--------------------------------------------------------------------------
| Routes Home
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Home\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    // Ajax
    Route::post('/ajax/charge', 'HomeController@charge');

});



