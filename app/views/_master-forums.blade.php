@extends('_master')

@section('navbar_class')
	navbar-inverse
@stop

@section('brand')
	<span class="glyphicon glyphicon-bullhorn"></span>
	<span>Seed Community</span>
@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
	@if (Auth::check())
		<li><a href="/boards">Message Boards</a></li>
		<li><a href="/chats">Chat Groups</a></li>
		<li><a href="/me">Profile</a></li>
		<li><a href="/logout">Log out</a></li>
	@else
		<li><a href="/signup">Sign up</a></li>
		<li><a href="/login">Log in</a></li>
	@endif
@stop