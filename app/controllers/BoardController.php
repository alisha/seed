<?php

class BoardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return View::make('readAllBoards')
			->with('boards', Board::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('createBoard');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//Validation
		$rules = array(
			'name' => 'required',
			'message' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/community/boards/create')
				->withInput()
				->withErrors($validator);
		}

		$board = new Board;
		$board->name = Input::get('name');
		$board->save();

		$message = new Message;
		$message->body = Input::get('message');
		$message->board_id = $board->id;
		$message->user_id = Auth::user()->id;
		$message->save();

		return Redirect::to('/community/boards/'.$board->id)
			->with('flash_message', 'Your board has been successfully created!')
			->with('alert_class', 'alert-success');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		return View::make('readOneBoard')
			->with('board', Board::findOrFail($id));
	}


	/**
	 * Send a reply
	 *
	 * @param int 	$id
	 * @return Response
	*/
	public function reply($id) {
		//Validation
		$rules = array('message' => 'required');

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/community/boards/create')
				->withInput()
				->withErrors($validator);
		}

		$message = new Message;
		$message->body = Input::get('message');
		$message->board_id = $id;
		$message->user_id = Auth::user()->id;
		$message->save();

		return Redirect::to('/community/boards/'.$id)
			->with('flash_message', 'Your message has been sent!')
			->with('alert_class', 'alert-success');
	}

}
