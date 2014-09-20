@extends('_master')

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
			<label for="message">Your Message:</label>
		    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
	    </div>
	    <div class="form-group">
		    <label for="message">Topic:</label>
		    <input type="textarea" class="form-control" name="message" id="message">
		</div>
		<div class="form-group">
		  	<button type="submit" class="btn btn-default">Create</button>
	  	</div>


		{{ Form::label('message', 'Your message:') }}
		{{ Form::textarea('message') }}

		<br>

		{{ Form::submit('Send!') }}

	{{ Form::close() }}

@stop