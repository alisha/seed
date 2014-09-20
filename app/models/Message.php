<?php

class Message extends Eloquent {

	public function board() {
		return $this->belongsTo('Board');
	}

	public function user() {
		return $this->belongsTo('User');
	}

}
