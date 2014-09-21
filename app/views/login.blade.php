@extends('_master')

@section('title')
	@parent
	 Log In
@stop

@section('content')

	<h1>Login to the Seed's community</h1>

	<h4>Seed uses your device as a username, all you need to remember is your password.</h4>
	<br>

	{{ Form::open(array('action' => 'UserController@loginUser')) }}
		<div class="form-group">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
	    </div>
	    <div class="form-group">
		    <div class="checkbox">
			    <label>
			      <input name="remember_me" type="checkbox"> Remember me
			    </label>
		  	</div>
	  	</div>
	  	<div class="form-group">
		  	<button type="submit" class="btn btn-default">Login</button>
	  	</div>
	{{ Form::close() }}

	<p>Not a member? <a href="/signup">Sign up today!</a></p>
@stop

@section('logged_out_links')
  	<li><a href="/signup">Sign Up</a></li>
  	<li class="active"><a href="/login">Log in</a></li>
@stop