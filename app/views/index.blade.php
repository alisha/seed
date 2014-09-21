@extends('_master-forums')

@section('content')

	<h1>Welcome to your local Seed</h1>
	@if (Auth::check())
		<p class="lead"></p>
	@else
		<p class="lead">Find educational resources like Wikipedia and MIT Courseware. <a href="/signup">Create an account</a> to connect with members of your community.</p>

	@endif

@stop