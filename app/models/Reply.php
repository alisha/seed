<?php

class Reply extends Eloquent {

	public function user() {
		return $this->belongsTo('User');
	}

	public function message() {
		return $this->belongsTo('Chat');
	}

	public function notification() {
		return $this->belongsToMany('User', 'notifications');
	}

	//Returns 1 if the message has read by the user
	public function isRead() {
		$notification = Notification::where('reply_id', '=', $this->id)->where('user_id', '=', Auth::user()->id)->first();
		return ($notification->has_read == 1) ? 1 : 0;
	}

}