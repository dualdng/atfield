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

Route::get('/', ['as'=>'home','uses'=>'MainController@index']);

Route::get('/side', 'MainController@getSide');
Route::get('/nav', 'MainController@getNav');

Route::get('picfall', 'MainController@getPicFall');

Route::get('single/{id}','MainController@getSingle');

Route::get('showgroup','MainController@getGroup');

Route::get('showsection','MainController@getSection');

Route::get('/{type}/forum/{id}','MainController@getForum');
Route::get('forum/{id}','MainController@getForumPage');

Route::get('home', 'HomeController@index');

Route::get('user/{id}','Dashboard\MainController@index');

Route::get('pic/post/{id}/{i}', 'MainController@getPic');

Route::get('pic/album/{albumId}/{i}','Dashboard\MainController@getPic');

Route::get('pic/{i}','MainController@Pic');

Route::get('comment/{id}', 'MainController@getComment');
Route::post('comment/{id}', 'MainController@postComment');

Route::get('commentarea/{id}', 'MainController@getCommentArea');

Route::get('auth/login', 'Auth\MainController@getLogin');

Route::post('auth/login', 'Auth\MainController@login');

Route::get('auth/register', 'Auth\MainController@getRegister');

Route::post('auth/register', 'Auth\MainController@register');

Route::get('auth/verify', 'Auth\MainController@verify');

Route::get('auth/logout', 'Auth\MainController@logout');

Route::get('/{id}/isread', 'MainController@isRead');

Route::get('/pagenav', 'MainController@pageNav');

Route::get('/active', 'Auth\MainController@active');

Route::get('/sendmail', 'Auth\MainController@sendMail');

Route::get('/any/{type}', 'MainController@anything');

Route::post('/view', 'MainController@view');

Route::group(['middleware'=>'myAuth'],function(){
		Route::get('dashboard/{id}','Dashboard\MainController@index');
		Route::get('dashboard/{id}/profile','Dashboard\MainController@profile');
		Route::get('dashboard/{id}/post','Dashboard\MainController@postPage');
		Route::get('dashboard/{id}/postlist','Dashboard\MainController@postList');
		Route::get('dashboard/{id}/editpost/{postId}','Dashboard\MainController@editPost');
		Route::post('dashboard/{id}/post','Dashboard\MainController@postPost');
		Route::any('dashboard/{id}/avatar','Dashboard\MainController@postAvatar');
		Route::any('dashboard/{id}/category','Dashboard\MainController@getCategoryPage');
		Route::post('dashboard/{id}/followuser/{userId}','Dashboard\MainController@followUser');
		Route::get('dashboard/{id}/followuser','Dashboard\MainController@getFollowUser');
		Route::get('dashboard/{id}/followpic','Dashboard\MainController@getFollowPicPage');
		Route::post('dashboard/{id}/followpic','Dashboard\MainController@followPic');
		Route::get('dashboard/{id}/followuserstate','Dashboard\MainController@getFollowUserState');
		Route::get('dashboard/{id}/followpost','Dashboard\MainController@getFollowPost');
		Route::get('dashboard/{id}/group','Dashboard\MainController@getMyGroup');
		Route::get('dashboard/{id}/newgroup','Dashboard\MainController@newGroup');
		Route::post('dashboard/{id}/newgroup','Dashboard\MainController@postGroup');
		Route::get('dashboard/{id}/newalbum','Dashboard\MainController@newAlbum');
		Route::post('dashboard/{id}/newalbum','Dashboard\MainController@postAlbum');
		Route::get('dashboard/{id}/album','Dashboard\MainController@album');
		Route::get('dashboard/{id}/album/{albumId}','Dashboard\MainController@pic');
		Route::get('dashboard/{id}/mygroup','Dashboard\MainController@group');
		Route::get('dashboard/{id}/msg', 'Dashboard\MainController@msg');
		Route::post('/clearmsg', 'Dashboard\MainController@clearMsg');
});

