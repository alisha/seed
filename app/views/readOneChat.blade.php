@extends('_master')

@section('title')
@parent | Chat: {{ $chat->subject }}
@stop

@section('content')

	<h1>Chat: {{ $chat->subject }}</h1>
	<h4><b>With:</b>
		@for ($index = 0; $index < count($users); $index++)
			{{ $users[$index]->name }} @if($index != count($users) - 1)@if ($index == count($users) - 2)@if (count($users) > 2), and @else and @endif @else, @endif @endif
		@endfor
	</h4>

	<br>

	@foreach ($replies as $reply)
		<p><a name="{{$reply->id}}" style="color:black;text-decoration:none;"><b>{{ $reply->user->name }}</b>:
		<br>{{ $reply->text }}</a></p>
	@endforeach

	<br>

	<h3>Reply:</h3>
	{{ Form::open(array('url' => '/chats/'.$chat->id, 'class' => 'form')) }}
		<div class="form-group">
			{{ Form::textarea('text', '', array('class' => 'form-control', 'placeholder' => 'Chat', 'rows' => '5')) }}
		</div>

		{{ Form::submit('Send!', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
@stop

@section('logged_in_links')
	<li><a href="/boards">Message Boards</a></li>
	<li class="active"><a href="/chats">Group Chats</a></li>
	<li><a href="/me">Your Profile</a></li>
	<li><a href="/logout">Logout</a></li>
@stop