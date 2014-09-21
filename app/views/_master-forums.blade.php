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
		<li><a href="/community/boards">Message Boards</a></li>
		<li><a href="/community/chats">Chat Groups</a></li>
		<li><a href="/community/me">Profile</a></li>
		<li><a href="/community/logout">Log out</a></li>
	@else
		<li><a href="/community/signup">Sign up</a></li>
		<li><a href="/community/login">Log in</a></li>
	@endif
@stop