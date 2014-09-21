@extends('_master')

@section('content')
	<h1>Your Profile <small><a href="/me/edit">Edit</a></small></h1>
	<p><b>Name: </b>{{ $user->name }}</p>
@stop

@section('logged_in_links')
	<li><a href="/boards">Message Boards</a></li>
	<li><a href="/chats">Group Chats</a></li>
	<li class="active"><a href="/me">Your Profile</a></li>
	<li><a href="/logout">Logout</a></li>
@stop