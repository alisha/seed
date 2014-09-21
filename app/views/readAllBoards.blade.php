@extends('_master')

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

@section('logged_in_links')
	<li class="active"><a href="/boards">Message Boards</a></li>
	<li><a href="/chats">Group Chats</a></li>
	<li><a href="/me">Your Profile</a></li>
	<li><a href="/logout">Logout</a></li>
@stop