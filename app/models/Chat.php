<?php

class Chat extends Eloquent {

	public function user() {
		return $this->belongsToMany('User');
	}

	public function reply() {
		return $this->hasMany('Reply')
			->orderBy('created_at');
	}

	public function getOtherUsers() {
		$allUsers = $this->user->all();
		$returnUsers = [];

		foreach ($allUsers as $user) {
			if ($user->id != Auth::user()->id) {
				array_push($returnUsers, $user);
			}
		}

		return $returnUsers;
	}

	public function numberOfUnreadReplies() {
		$numUnread = 0;
		$replies = $this->reply()->get();

		foreach ($replies as $reply) {
			if ($reply->isRead() == 0) {
				$numUnread++;
			}
		}

		return $numUnread;
	}

}