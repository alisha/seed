@extends('_master')

@section('title')
	@parent
	 - Message Boards
@stop

@section('content')

	<div class="row">
		<div class="col-md-6">Name</div>
		<div class="col-md-6">Last Reply</div>

		@foreach($boards as $board)

			<div class="col-md-6">
				{{ $board->name }}
			</div>

			<div class="col-md-6">
				{{--{{ date('n/j/y g:i a e', strtotime($board->mostRecentPostDate())) }}--}} 
				by {{ $board->mostRecentAuthor() }}
			</div>

		@endforeach
	</div>

@stop