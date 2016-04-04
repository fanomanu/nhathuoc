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

Route::group(['prefix'=>'admin'], function(){

	Route::group(['prefix'=>'category'], function(){
		Route::get('add',['as'	=> 'admin.category.getAdd', 'uses'=>'CategoryController@getAdd']);
		Route::post('add',['as'	=> 'admin.category.postAdd', 'uses'=>'CategoryController@postAdd']);

		Route::get('/',['as'	=>	'admin.category','uses'	=>	'CategoryController@index']);
		Route::get('data',['as'	=>	'admin.category.data','uses'	=> 	'CategoryController@getData']);

		Route::get('delete/{id}',['as' => 'admin.category.getDelete','uses' => 'CategoryController@getDelete']);

		Route::get('edit/{id}',['as'=> 'admin.category.getEdit', 'uses'=>'CategoryController@getEdit']);
		Route::post('edit/{id}',['as'=> 'admin.category.postEdit', 'uses'=>'CategoryController@postEdit']);
	});

	Route::group(['prefix'=>'product'], function(){
		Route::get('add',['as'	=> 'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
		Route::post('add',['as'	=> 'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);

		Route::get('/',['as'	=>	'admin.product','uses'	=>	'ProductController@index']);
		Route::get('data',['as'	=>	'admin.product.data','uses'	=> 	'ProductController@getData']);

		Route::get('delete/{id}',['as' => 'admin.product.getDelete','uses' => 'ProductController@getDelete']);

		Route::get('edit/{id}',['as'=> 'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=> 'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);

		Route::post('imageUpload/{id}',['as'=> 'admin.product.postImageUpload', 'uses'=>'ProductController@imageUpload']);	
		Route::post('imageCrop/{id}',['as'=> 'admin.product.postImageCrop', 'uses'=>'ProductController@imageCrop']);
		Route::post('imageDelete/{id}',['as'=> 'admin.product.postImageDelete', 'uses'=>'ProductController@imageDelete']);		
	});
});

