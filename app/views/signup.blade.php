@extends('_master')

@section('title')
	@parent
	 - Sign Up
@stop

@section('content')

	<h1>Sign up</h1>

	{{ Form::open(array('action' => 'UserController@createUser')) }}

		<h4>Seed will automatically detect your device and allow you to sign in. Please add a password for a secure connection</h4>
		<div class="form-group">
			<label for="name">Name:</label>
		    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
	    </div>
	    <div class="form-group">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
		</div>
		<div class="form-group">
		  	<button type="submit" class="btn btn-default">Sign up</button>
	  	</div>
	{{ Form::close() }}

@stop