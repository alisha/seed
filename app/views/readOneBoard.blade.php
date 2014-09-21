@extends('_master-forums')

@section('title')
	@parent
	 - {{ $board->name }}
@stop

@section('content')

	<h1>{{ $board->name }} - Message Board</h1>

	@foreach ($board->message()->get() as $message)

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4">
					<p><b>{{ User::findOrFail($message->user_id)->name }}</b> says:
				</div>
				<div class="col-md-3">
					<p>({{ date('F j, Y g:i a e', strtotime($message->created_at)) }})</p>
				</div>
			</div>
			<div class="col-md-12">
				<p>{{ $message->body }}</p>
			</div>
		</div><br>

	@endforeach

	{{ Form::open(array('url' => '/boards/'.$board->id)) }}
	<h4>Add Message</h4>
	  	<div class="form-group">
			{{ Form::label('message', 'Your message:') }}
			{{ Form::textarea('message') }}
		</div>

		<br>

		<div class="form-group">
		  	<button type="submit" class="btn btn-default">Send!</button>
	  	</div>

	{{ Form::close() }}

@stop

@section('navbar_lis')
	<li><a href="/">Project Seed Home</a></li>
	<li class="active"><a href="/community/boards">Message Boards</a></li>
	<li><a href="/community/chats">Chat Groups</a></li>
	<li><a href="/community/me">Profile</a></li>
	<li><a href="/community/logout">Log out</a></li>
@stop