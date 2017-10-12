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

Route::post('/message/create', [
	'uses' => 'MessageController@create',
	'as' => 'message.create'
]);

Route::post('/message/comment', [
	'uses' => 'MessageController@comment',
	'as' => 'message.comment'
]);

Route::get('/user/{username}', 'UserController@index')->name('user.index');

Route::get('/user', 'UserController@user')->name('user');

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/{username}', 'HomeController@profile')->name('profile.public');




