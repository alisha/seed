@extends('_master')

@section('title')
	@parent
	 Log In
@stop

@section('content')

	{{ Form::open(array('action' => 'UserController@loginUser')) }}

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}

		<br>

		{{ Form::checkbox('remember_me', '1') }}
		{{ Form::label('remember_me', 'Remember me') }}

		<br>

		{{ Form::submit('Log me in!') }}

	{{ Form::close() }}

	<p>Not a member? <a href="/signup">Sign up today!</a></p>

@stop