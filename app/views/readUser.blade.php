@extends('_master')

@section('content')

	<h1>Your Profile <small><a href="/me/edit">Edit</a></small></h1>

	<p><b>Name: </b>{{ $user->name }}</p>

@stop