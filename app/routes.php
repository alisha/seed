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

Route::get('/', function() {
	return View::make('hello');
});

Route::get('/signup', function() {
	if (!Auth::check()) {
		return View::make('signup');
	} else {
		return Redirect::to('/');
	}
});

Route::post('/signup', 'UserController@createUser');

Route::get('/login', function() {
	if (!Auth::check()) {
		return View::make('login');
	} else {
		return Redirect::to('/');
	}
});

Route::post('/login', 'UserController@loginUser');

Route::get('/logout', function() {
	if (Auth::check()) {
		Auth::logout();
		return Redirect::to('/')
			->with('flash_message', 'You\'ve been logged out.');
	} else {
		return Redirect::to('/');
	}
});

Route::get('/me', 
	array(
		'before' => 'auth',
		function() {
			return View::make('readUser')
				->with('user', Auth::user());
		}
	)
);