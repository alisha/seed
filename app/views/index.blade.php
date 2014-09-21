@extends('_master')

@section('content')

	<h1>Welcome to your local Seed</h1>
	@if (Auth::check())
		<p class="lead">You're now connected to this Seed's local network</p>
	@else
		<p class="lead">Find educational resources like Wikipedia and Khan Academy. Create an account to connect with members of your community.</p>
	@endif

@stop