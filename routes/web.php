<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/message'], function(){
	Route::post('/create', [
		'uses' => 'MessageController@create',
		'as' => 'message.create'
	]);

	Route::post('/comment', [
		'uses' => 'MessageController@comment',
		'as' => 'message.comment'
	]);

	Route::post('/delete/{id}', 'MessageController@delete')->name('message.delete');
});

Route::group(['prefix' => '/home'], function(){
	Auth::routes();

	Route::get('/redirect', 'HomeController@redirect')->name('redirect');
});

Route::get('/{username}', 'HomeController@profile')->name('profile.public');

Route::get('/{username}/user', 'UserController@index')->name('user.index');

Route::get('/{username}/settings', 'UserController@settings')->name('user.settings');

Route::get('/', 'HomeController@index')->name('home');







