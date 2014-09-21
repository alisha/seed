@extends('_master-forums')

@section('title')
	@parent
	 - Log In
@stop

@section('content')

	<h1>Login to the Seed's community</h1>

	<h4>Seed uses your device as a username, so all you need to remember is your password.</h4>
	<br>

	{{ Form::open(array('action' => 'UserController@loginUser')) }}
		<div class="form-group">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" name="password" id="password">
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

	<p>Not a member? <a href="/community/signup">Sign up today!</a></p>
@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
  	<li><a href="/community/signup">Sign Up</a></li>
  	<li class="active"><a href="/community/login">Log in</a></li>
@stop