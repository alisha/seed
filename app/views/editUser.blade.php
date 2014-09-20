@extends('_master')

@section('content')
	<h1>Edit Your Profile</h1>

	{{ Form::open(array('action' => 'UserController@updateUser')) }}
		<div class="form-group">
			<label for="password">Name:</label>
		    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
	    </div>

	    <div class="form-group">
		    <label for="current_password">Current Password:</label>
		    <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password">
		</div>
	    <div class="form-group">
		    <label for="new_password">New Password (optional):</label>
		    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
		</div>
		<div class="form-group">
		  	<button type="submit" class="btn btn-default">Save</button>
  			<p><a href="/me">Or cancel</a></p>
	  	</div>
	{{ Form::close() }}
@stop