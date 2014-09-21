@extends('_master')

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
			<p><a href="/chats/{{$chat->id}}"><b>{{ $chat->subject }}</b> ({{ $chat->numberOfUnreadReplies() }})</a><br>With:
				{{-- Display users in the chat --}}
				@for ($index = 0; $index < count($chat->getOtherUsers()); $index++)
					{{ $chat->getOtherUsers()[$index]->name }} @if($index != count($chat->getOtherUsers()) - 1)@if ($index == count($chat->getOtherUsers()) - 2)@if (count($chat->getOtherUsers()) > 2), and @else and @endif @else, @endif @endif
				@endfor
			</p>
			<br>
		@endforeach
	@endif

	{{-- Add button --}}
	{{ Form::open(array('route' => 'chats.create', 'method' => 'get')) }}
		<button class="btn btn-primary" href="/courses/create">New chat</button>
	{{ Form::close() }}
@stop