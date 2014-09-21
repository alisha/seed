@extends('_master-forums')

@section('content')
	<h1>Your Profile <small><a href="/me/edit">Edit</a></small></h1>
	<p><b>Name: </b>{{ $user->name }}</p>
@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
	<li><a href="/boards">Message Boards</a></li>
	<li><a href="/chats">Chat Groups</a></li>
	<li class="active"><a href="/me">Profile</a></li>
	<li><a href="/logout">Log out</a></li>
@stop