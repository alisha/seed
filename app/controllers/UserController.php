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
			return Redirect::to('/community/signup')
				->withInput()
				->withErrors($validator);
		}

		if (count(User::where('ip', '=', $_SERVER['REMOTE_ADDR'])->get()) > 0) {
			return Redirect::to('/community/signup')
				->withInput()
				->with('flash_message', 'Your IP address is already registered with Seed. Have you forgotten your password?')
				->with('alert_class', 'alert-danger');
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
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/community/login')
				->withInput()
				->withErrors($validator);
		}

		if (Auth::attempt(array('ip' => $_SERVER['REMOTE_ADDR'], 'password' => Input::get('password')), Input::get('remember_me'))) {
			return Redirect::intended('/')
				->with('flash_message', 'Welcome back!');
		} else {
			return Redirect::to('/community/login')
				->with('flash_message', 'That didn\'t seem to work - try again?')
				->with('alert_class', 'alert-danger')
				->withInput();
		}
	}

	public function updateUser() {
		//Validation
		$rules = array(
			'name' => 'required',
			'current_password' => 'required_with:new_password',
			'new_password' => 'required_with:current_password'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/community/me/edit')
				->withInput()
				->withErrors($validator);
		}

		$user = Auth::user();
		$user->name = Input::get('name');

		if (Input::get('current_password') != "") {
			if (Hash::check(Input::get('current_password'), $user->password)) {
				$user->password = Hash::make(Input::get('new_password'));
			} else {
				return Redirect::to('/community/me/edit')
					->withInput()
					->with('flash_message', 'Your current password doesn\'t match your actual password. Try again?')
					->with('alert_class', 'alert-danger');
			}
		}

		$user->save();

		return Redirect::to('/community/me')
			->with('flash_message', 'Your information has been successfully updated!')
			->with('alert_class', 'alert-success');
	}

}