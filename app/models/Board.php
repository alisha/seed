<?php

class Board extends Eloquent {

	public function message() {
		return $this->hasMany('Message');
	}

}
