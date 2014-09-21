@extends('_master-forums')

@section('title')
	@parent
	 - Message Boards
@stop

@section('content')

	<h1>All Message Boards <small><a href="/community/boards/create">Create one!</a></small></h1>

	<table class="table table-striped">
		<tr>
			<td><b>Name</b></td>
			<td><b>Last Reply</b></td>
		</tr>

		@foreach($boards as $board)
			<tr>
				<td><a href="/community/boards/{{$board->id}}">{{ $board->name }}</a></td>
				<td>{{ date('n/j/y g:i a e', strtotime($board->mostRecentPostDate())) }} by {{ $board->mostRecentAuthor() }}</td>
			</tr>
		@endforeach

	</table>

@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
	<li class="active"><a href="/community/boards">Message Boards</a></li>
	<li><a href="/community/chats">Chat Groups</a></li>
	<li><a href="/community/me">Profile</a></li>
	<li><a href="/community/logout">Log out</a></li>
@stop