<?php

class ChatController extends \BaseController {

	/**
	 *Get the users associated with an array, excluding the logged in user
	 *
	 * @param  int  $id
	 * @return array
	 *
	 */
	public function getOtherUsers($id) {
		$allUsers = Chat::findOrfail($id)->user->all();
		$returnUsers = [];

		foreach ($allUsers as $user) {
			if ($user->id != Auth::user()->id) {
				array_push($returnUsers, $user);
			}
		}

		return $returnUsers;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$chats = Auth::user()->chat->all();
		
		return View::make('readChats')->with('chats', $chats);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('createChat');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$chat = new Chat;

		//Validation
		$rules = array(
			'users' => 'required',
			'subject' => 'required',
			'text' => 'required'
		);
		$validator = Validator::make(Input::all(), 
			$rules);

		if ($validator->fails()) {
			return Redirect::to('/community/chats/create')
				->withInput()
				->withErrors($validator);
		}

		$chat->subject = Input::get('subject');
		$chat->last_reply = date("Y-m-d H:i:s");
		$chat->save();

		$chat->user()->attach(Auth::user()->id);
		foreach (Input::get('users') as $id) {
			$chat->user()->attach($id);
		}

		$reply = new Reply;
		$reply->text = Input::get('text');
		$reply->chat_id = $chat->id;
		$reply->user_id = Auth::user()->id;
		$reply->save();

		//Set up notifications for this chat
		foreach ($chat->user->all() as $user) {
			$reply->notification()->save($user);
		}
		$notification = Notification::where('user_id', '=', Auth::user()->id)
			->where('reply_id', '=', $reply->id)
			->firstOrFail();
		$notification->has_read = 1;
		$notification->save();

		return Redirect::to('/community/chats')
			->with('flash_chat', 'Your chat has been sent')
			->with('alert_class', 'alert-success');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$chat = Chat::find($id);

		if (!(isset($chat))) {
			return Redirect::to('/community/chats')
				->with('flash_chat', 'That chat doesn\'t exist!')
				->with('alert_class', 'alert-danger');
		}

		$users = $chat->user->all();

		//If the user isn't part of the conversation, don't let them view it
		$inArray = false;
		foreach ($users as $user) {
			if ($user->id == Auth::user()->id) {
				$inArray = true;
			}
		}

		if (!$inArray) {
			return Redirect::to('/community/chats')
				->with('flash_chat', 'You don\'t have permission to view this chat')
				->with('alert_class', 'alert-danger');
		}

		$replies = Reply::where('chat_id', '=', $chat->id)->get();

		foreach ($replies as $reply) {
			$notification = Notification::where('user_id', '=', Auth::user()->id)
				->where('reply_id', '=', $reply->id)
				->firstOrFail();
			$notification->has_read = 1;
			$notification->save();
		}

		return View::make('readOneChat')->with(array(
			'chat' => $chat,
			'users' => $chat->getOtherUsers(),
			'replies' => $replies
		));
	}

	/**
	 * Send a reply
	 *
	 * @param int 	$id
	 * @return Response
	*/
	public function reply($id) {
		$chat = Chat::findOrfail($id);
		$chat->last_reply = date("Y-m-d H:i:s");
		$chat->save();

		$reply = new Reply;
		$reply->text = Input::get('text');
		$reply->chat_id = $chat->id;
		$reply->user_id = Auth::user()->id;
		$reply->save();

		//Set up notifications for this chat
		foreach ($chat->user()->get() as $user) {
			$reply->notification()->save($user);
		}

		$notification = Notification::where('user_id', '=', Auth::user()->id)
			->where('reply_id', '=', $reply->id)
			->firstOrFail();
		$notification->has_read = 1;
		$notification->save();		

		return Redirect::to('/community/chats/'.$id)
			->with('flash_chat', 'Your chat has been sent!')
			->with('alert_class', 'alert-success');
	}
}
