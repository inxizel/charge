<?php

/*
|--------------------------------------------------------------------------
| Routes Home
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Zent\Home\Http\Controllers', 'middleware' => ['locale', 'activity']], function () {

    // Ajax
    Route::get('/ajax/charge', 'HomeController@charge');

});



