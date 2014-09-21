@extends('_master')

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

@section('logged_in_links')
	<li class="active"><a href="/boards">Message Boards</a></li>
	<li><a href="/chats">Group Chats</a></li>
	<li><a href="/me">Your Profile</a></li>
	<li><a href="/logout">Logout</a></li>
@stop