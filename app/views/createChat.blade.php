@extends('_master-forums')

@section('title')
	@parent
	 - New Chat
@stop

@section('content')

	<h1>New Chat<br>
	<small>All fields are required</small></h1>

	<br>

	{{ Form::open(array('action' => 'ChatController@store', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('users[]', 'Users:') }} <br>
			<span class="help-block">Hold the command button and click on a name to select multiple people</span>
			
			<select name="users[]" class="form-control" multiple>
				@foreach (User::all() as $user)
					@if ($user->id != Auth::user()->id)
						<option value="{{$user->id}}">{{$user->name}}</option>
					@endif
				@endforeach
			</select>
		</div>

		<div class="form-group">
			{{ Form::label('subject', 'Subject:') }}
			
			{{ Form::text('subject', '', array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('text', 'Message:') }}
			
			{{ Form::textarea('text', '', array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Send!', array('class' => 'btn btn-primary')) }}
		</div>

	{{ Form::close() }}
@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
	<li><a href="/community/boards">Message Boards</a></li>
	<li class="active"><a href="/community/chats">Chat Groups</a></li>
	<li><a href="/community/me">Profile</a></li>
	<li><a href="/community/logout">Log out</a></li>
@stop