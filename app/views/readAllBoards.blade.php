@extends('_master-forums')

@section('title')
	@parent
	 - Message Boards
@stop

@section('content')

	<h1>All Message Boards <small><a href="/boards/create">Create one!</a></small></h1>

	<table class="table table-striped">
		<tr>
			<td><b>Name</b></td>
			<td><b>Last Reply</b></td>
		</tr>

		@foreach($boards as $board)
			<tr>
				<td><a href="/boards/{{$board->id}}">{{ $board->name }}</a></td>
				<td>{{ date('n/j/y g:i a e', strtotime($board->mostRecentPostDate())) }} by {{ $board->mostRecentAuthor() }}</td>
			</tr>
		@endforeach

	</table>

@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
	<li class="active"><a href="/boards">Message Boards</a></li>
	<li><a href="/chats">Chat Groups</a></li>
	<li><a href="/me">Profile</a></li>
	<li><a href="/logout">Log out</a></li>
@stop