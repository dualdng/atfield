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

Route::get('/', 'MainController@index');

Route::get('picfall', 'MainController@getPicFall');

Route::get('single/{id}','MainController@getSingle');

Route::get('home', 'HomeController@index');

Route::get('pic/{id}/{i}', 'MainController@getPic');

Route::get('comment/{id}', 'MainController@getComment');

Route::get('commentarea', 'MainController@getCommentArea');

Route::group(['middleware'=>'auth'],function(){
		Route::get('dashboard/{id}','Dashboard\MainController@index');
		Route::get('dashboard/{id}/profile','Dashboard\MainController@profile');
		Route::get('dashboard/{id}/post','Dashboard\MainController@postPage');
		Route::get('dashboard/{id}/postlist','Dashboard\MainController@postList');
		Route::get('dashboard/{id}/editpost/{postId}','Dashboard\MainController@editPost');
		Route::post('dashboard/{id}/post','Dashboard\MainController@postPost');
		Route::any('dashboard/{id}/avatar','Dashboard\MainController@postAvatar');
		Route::any('dashboard/{id}/category','Dashboard\MainController@getCategoryPage');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
