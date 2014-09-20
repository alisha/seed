@extends('_master')

@section('title')
	@parent
	 - Create a New Message Board
@stop

@section('content')

	<h1>Create a New Message Board</h1>

	{{ Form::open(array('action' => 'BoardController@store')) }}

		{{ Form::label('name', 'Name of board:') }}
		{{ Form::text('name') }}

		<br>

		{{ Form::label('message', 'Message:') }}
		{{ Form::textarea('message') }}

		<br>

		{{ Form::submit('Create!') }}

	{{ Form::close() }}

@stop