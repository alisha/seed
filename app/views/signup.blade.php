@extends('_master')

@section('title')
	@parent
	 - Sign Up
@stop

@section('content')

	{{ Form::open(array('action' => 'UserController@createUser')) }}

		{{ Form::label('name', 'Name') }}
		{{ Form::text('name') }}

		<br>

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}

		<br>

		{{ Form::submit('Sign me up!') }}

	{{ Form::close() }}

@stop