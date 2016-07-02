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

	// Welcome Page Routes
	Route::get('/', [
		'uses'	=> 'HomeController@index',
		'as'		=> 'home'
	]);

	// Ganti Bahasa
	Route::get('language/{lang}', 'HomeController@language')->where('lang', '[A-Za-z_-]+');

	// Contact Routes
	Route::resource('contact', 'ContactController', [
		'except' => ['show', 'edit']
	]);
	
	//Coba redirect nih
	Route::get('contact/admin', 'ContactController@admin')->middleware(['admin']);
	Route::get('contact/dashboard', 'ContactController@dashboard')->middleware(['redac']);
	Route::get('contact/user', 'ContactController@user');

	// Authentication Routes ...
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

	// Resend Routes ...
	Route::get('auth/resend', 'Auth\AuthController@getResend');

	// Registration Routes ...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	// Password Reset Link Request Routes ...
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	Route::post('password/email', 'Auth\PasswordController@postEmail');

	// Password Reset Routes ...
	Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('password/reset', 'Auth\PasswordController@postReset');