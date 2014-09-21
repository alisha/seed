@extends('_master-forums')

@section('title')
	@parent
	 - Create a New Message Board
@stop

@section('content')

	<h1>Create a New Message Board</h1>

	<h4>Boards allow you to have public conversations with other Seed users</h4>
	<br>

	{{ Form::open(array('action' => 'BoardController@store')) }}
		<div class="form-group">
			<label for="name">Name of the Board:</label>
		    <input type="text" class="form-control" name="name" id="name">
	    </div>
	    <div class="form-group">
		    <label for="message">Topic:</label>
		    <input type="textarea" class="form-control" name="message" id="message">
		</div>
		<div class="form-group">
		  	<button type="submit" class="btn btn-default">Create</button>
	  	</div>

	{{ Form::close() }}
@stop

@section('navbar_lis')
	<li><a href="/community/">Project Seed Home</a></li>
	<li class="active"><a href="/community/boards">Message Boards</a></li>
	<li><a href="/community/chats">Chat Groups</a></li>
	<li><a href="/community/me">Profile</a></li>
	<li><a href="/community/logout">Log out</a></li>
@stop