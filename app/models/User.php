<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function chat() {
		return $this->belongsToMany('Chat')
			->orderBy('last_reply', 'desc');
	}

	public function reply() {
		return $this->hasMany('Reply');
	}

	public function notification() {
		return $this->belongsToMany('Reply', 'notifications');
	}

	public function numberOfUnreadMessages() {
		return count(Notification::where('user_id', '=', $this->id)->where('has_read', '=', '0')->get());
	}

}
