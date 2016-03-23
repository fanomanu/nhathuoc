<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ---------------admin--------------------
// ----------------------------------------
Route::group(['prefix'=>'admin'], function(){

	//--- Category ---
	Route::group(['prefix'=>'category'], function(){
		// add
		Route::get('add',['as'	=> 'admin.category.getAdd', 'uses'=>'CategoryController@getAdd']);
		Route::post('add',['as'	=> 'admin.category.postAdd', 'uses'=>'CategoryController@postAdd']);

		// list
		Route::get('list',['as'	=>	'admin.category.list','uses'	=>	'CategoryController@getList']);
		Route::get('data',['as'	=>	'admin.category.data','uses'	=> 	'CategoryController@getData']);
	});
	//--- END Category ---
});
// ------------END admin--------------------
// -----------------------------------------
