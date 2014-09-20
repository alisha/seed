<?php

class Board extends Eloquent {

	public function message() {
		return $this->hasMany('Message');
	}

	public function mostRecentAuthor() {
		return $this->message->last()->user->name;
	}

	public function mostRecentPostDate() {
		return $this->message->last()->created_at;
	}

}
