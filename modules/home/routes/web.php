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

    Route::get('/',function(){

    	$api = json_decode(file_get_contents(base_path('core/config/thecao.json')));

    	$a = 'bgates';
    	$b = 'first';

    	echo $api->$a->$b;

    	$api->bgates->first = 1000;




    	// Write File

	    $newJsonString = json_encode($api, JSON_PRETTY_PRINT);

	    file_put_contents(base_path('core/config/thecao.json'), stripslashes($newJsonString));

		//dd($api);    

		    //Config::set('thecao.api.Viettel.20', 'muacard');


		    // echo Config::get('thecao.api.Viettel.20');



    });

});



