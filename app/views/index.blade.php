@extends('_master')

@section('content')

	<h1>Welcome to your local Seed</h1>
	@if (Auth::check())
		<p class="lead"></p>
	@else
		<p class="lead">Find educational resources like Wikipedia and MIT Courseware. <a href="/signup">Create an account</a> to connect with members of your community.</p>

	@endif
	<div class="alert alert-danger" role="alert">
  		<a href="/ebola" class="alert-link">
  			<h4><span class="glyphicon glyphicon-exclamation-sign"></span> Important News</h4>
			<p>
				Protect youself against Ebola; learn the symptoms and how to avoid getting infected.
			</p>
  		</a>
	</div>
		<br />
		<div class="text-center">
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>
			<span class="glyphicon glyphicon-tree-conifer"></span>

		</div>

		<hr>
		<p>
		Project Seed was created to provide areas with little-to-no upstream internet connect to features usually only availible to those with a web connection. We believe that technology can be an aide to increasing the well being of everyone, including the 3+ billion people around the world that current lack a connection. Seeds are portable and inexpense, meaning they can be deployed in environments where traditional communication infrastructure has failed.
		</p>

@stop