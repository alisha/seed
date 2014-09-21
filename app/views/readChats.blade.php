@extends('_master-forums')

@section('title')
	@parent
	 - Chats
@stop

@section('content')
	<h1>Your Chats</h1>
	@if (count($chats) == 0)
		<p>You don't have any chats!</p>
	@else
		@foreach ($chats as $chat)
			<p><a href="/community/chats/{{$chat->id}}"><b>{{ $chat->subject }}</b> ({{ $chat->numberOfUnreadReplies() }})</a><br>With:
				{{-- Display users in the chat --}}
				@for ($index = 0; $index < count($chat->getOtherUsers()); $index++)
					{{ $chat->getOtherUsers()[$index]->name }} @if($index != count($chat->getOtherUsers()) - 1)@if ($index == count($chat->getOtherUsers()) - 2)@if (count($chat->getOtherUsers()) > 2), and @else and @endif @else, @endif @endif
				@endfor
			</p>
			<br>
		@endforeach
	@endif

	<p><a href="/community/chats/create">Create a new chat</a></p>
@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
	<li><a href="/community/boards">Message Boards</a></li>
	<li class="active"><a href="/community/chats">Chat Groups</a></li>
	<li><a href="/community/me">Profile</a></li>
	<li><a href="/community/logout">Log out</a></li>
@stop