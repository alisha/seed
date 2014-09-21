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

Route::get('/health', function() {
	return View::make('health');
});

Route::get('/healthTips', function() {
	return View::make('healthTips');
});

Route::get('/ebolaSpread', function() {
	return View::make('ebolaSpread');
});


/* User functions */

Route::group(['prefix' => '/community'], function() {

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

		Route::post('/community/chats/{id}', 'ChatController@reply');
		Route::resource('chats', 'ChatController');
	});

	Route::get('/test', function() {
		var_dump(Board::findOrFail(1)->message()->get()->last());
	});
});

Route::get('/seeder', function() {
	$faker = Faker\Factory::create();

	$user = new User;
	$user->ip = "94.198.135.79";
	$user->name = $faker->name;
	$user->password = Hash::make('test');
	$user->save();

	$user = new User;
	$user->ip = "94.228.204.10";
	$user->name = $faker->name;
	$user->password = Hash::make('test');
	$user->save();

	$user = new User;
	$user->ip = "95.31.42.89";
	$user->name = $faker->name;
	$user->password = Hash::make('test');
	$user->save();

	$user = new User;
	$user->ip = "188.134.76.66";
	$user->name = $faker->name;
	$user->password = Hash::make('test');
	$user->save();

});

Route::get('/as1', function() {
	$id = User::where('ip', '=', '94.198.135.79')->first()->id;
	Auth::loginUsingId($id);
});

Route::get('/as2', function() {
	$id = User::where('ip', '=', '94.228.204.10')->first()->id;
	Auth::loginUsingId($id);
});

Route::get('/as3', function() {
	$id = User::where('ip', '=', '5.31.42.89')->first()->id;
	Auth::loginUsingId($id);
});

Route::get('/as4', function() {
	$id = User::where('ip', '=', '188.134.76.66')->first()->id;
	Auth::loginUsingId($id);
});
