<?php

class Notification extends Eloquent {

	public function user() {
		return $this->belongsToMany('User', 'notifications');
	}

	public function reply() {
		return $this->belongsToMany('Reply', 'notifications');
	}

}