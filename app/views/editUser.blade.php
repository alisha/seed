@extends('_master')

@section('content')
	<h1>Edit Your Profile</h1>

	{{ Form::open(array('action' => 'UserController@updateUser')) }}

		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', $user->name) }}

		<br>

		{{ Form::label('current_password', 'Current password (only if you want to change your password):') }}
		{{ Form::password('current_password') }}

		<br>

		{{ Form::label('new_password', 'New password (only if you want to change your password):') }}
		{{ Form::password('new_password') }}

		<br>

		{{ Form::submit('Update my information!') }}
		<p><a href="/me">Or cancel</a></p>

	{{ Form::close() }}
@stop