<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@hello', 'as' => 'home'));

Route::group(array('before' => 'guest'), function()
{
	Route::get('user/create', array('uses' => 'UserController@getCreate', 'as' => 'getCreate'));
	Route::get('user/login', array('uses' => 'UserController@getLogin', 'as' => 'getLogin'));

	Route::group(array('csrf'), function()
	{
		Route::post('user/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
		Route::post('user/login', array('uses' => 'UserController@postLogin', 'as' => 'postLogin'));
	});
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));
});
