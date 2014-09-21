@extends('_master-forums')

@section('title')
	@parent
	 - Sign Up
@stop

@section('content')

	<h1>Sign up</h1>

	<h4>Seed will automatically detect your device and allow you to sign in. Please add a password for a secure connection</h4>
	<br>

	{{ Form::open(array('action' => 'UserController@createUser')) }}
		<div class="form-group">
			<label for="name">Name:</label>
		    <input type="text" class="form-control" name="name" id="name">
	    </div>
	    <div class="form-group">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" name="password" id="password">
		</div>
		<div class="form-group">
		  	<button type="submit" class="btn btn-default">Sign up</button>
	  	</div>
	{{ Form::close() }}
@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
  	<li class="active"><a href="/signup">Sign Up</a></li>
  	<li><a href="/login">Log in</a></li>
@stop