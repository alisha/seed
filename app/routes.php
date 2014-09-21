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
/* Static functions */

Route::get('/', function() {
	return View::make('index');
});

Route::get('/tools', function() {
	return View::make('tools');
});

Route::get('/ebola', function() {
	return View::make('ebola');
});

/* User functions */

// Show form to create new user
Route::get('/signup', function() {
	if (!Auth::check()) {
		return View::make('signup');
	} else {
		return Redirect::to('/');
	}
});

// Handle form to create new user
Route::post('/signup', 'UserController@createUser');

// Log in a user
Route::get('/login', function() {
	if (!Auth::check()) {
		return View::make('login');
	} else {
		return Redirect::to('/');
	}
});

// Handle log in data
Route::post('/login', 'UserController@loginUser');

// Log out a user
Route::get('/logout', function() {
	if (Auth::check()) {
		Auth::logout();
		return Redirect::to('/')
			->with('flash_message', 'You\'ve been logged out.');
	} else {
		return Redirect::to('/');
	}
});

// Show a user their profile
Route::get('/me', 
	array(
		'before' => 'auth',
		function() {
			return View::make('readUser')
				->with('user', Auth::user());
		}
	)
);

// Show the form for a user to edit their profile
Route::get('/me/edit',
	array(
		'before' => 'auth',
		function() {
			return View::make('editUser')
				->with('user', Auth::user());
		}
	)
);

// Handle the form for a user to edit their information
Route::post('/me/edit', 'UserController@updateUser');

/* Board functions */

Route::group(array('before' => 'auth'), function() {

	Route::post('boards/{id}', 'BoardController@reply');
	Route::resource('boards', 'BoardController');

	Route::post('chats/{id}', 'ChatController@reply');
	Route::resource('chats', 'ChatController');
});

Route::get('/test', function() {
	var_dump(Board::findOrFail(1)->message()->get()->last());
});