@extends('_master')

@section('title')
	@parent
	 - {{ $board->name }}
@stop

@section('content')

	<h1>{{ $board->name }}</h1>

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

		{{ Form::label('message', 'Your message:') }}
		{{ Form::textarea('message') }}

		<br>

		{{ Form::submit('Send!') }}

	{{ Form::close() }}

@stop