@extends('_master')

@section('title')
	@parent
	 - New Chat
@stop

@section('content')

	<h1>New Chat<br>
	<small>All fields are required</small></h1>

	<br>

	{{ Form::open(array('route' => 'chats.store', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			<div class="col-sm-2">
				{{ Form::label('users[]', 'Users:') }} <br>
				<span class="help-block">Hold the command button and click on a name to select multiple people</span>
			</div>

			<div class="col-sm-10">
				<select name="users[]" class="form-control" multiple>
					@foreach (User::all() as $user)
						@if ($user->id != Auth::user()->id)
							<option value="{{$user->id}}">{{$user->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2">
				{{ Form::label('subject', 'Subject:') }}
			</div>

			<div class="col-sm-10">
				{{ Form::text('subject', '', array('class' => 'form-control', 'placeholder' => 'Subject')) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2">
				{{ Form::label('text', 'Message:') }}
			</div>

			<div class="col-sm-10">
				{{ Form::textarea('text', '', array('class' => 'form-control', 'placeholder' => 'Message')) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Send!', array('class' => 'btn btn-primary')) }}
			</div>
		</div>

	{{ Form::close() }}

@stop