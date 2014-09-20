<?php

class UserController extends BaseController {

	// Creates a new user after given form input
	public function createUser() {
		//Validation
		$rules = array(
			'name' => 'required',
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/signup')
				->withInput()
				->withErrors($validator);
		}

		$user = new User;
		$user->name = Input::get('name');
		$user->password = Hash::make('password');
		$user->ip = $_SERVER['REMOTE_ADDR'];
		$user->save();

		Auth::loginUsingId($user->id);

		return Redirect::to('/');
	}

	public function loginUser() {
		//Validation
		$rules = array(
			'name' => 'required',
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/signup')
				->withInput()
				->withErrors($validator);
		}

		if (Auth::attempt(array('ip' => $_SERVER['REMOTE_ADDR'], 'password' => Input::get('password')), Input::get('remember_me'))) {
			return Redirect::intended('/')
				->with('flash_message', 'Welcome back!');
		} else {
			return Redirect::to('/login')
				->with('flash_message', 'That didn\'t seem to work - try again?')
				->with('alert_class', 'alert-danger')
				->withInput();
		}
	}

}