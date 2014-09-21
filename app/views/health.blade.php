@extends('_master')

@section('title')
	 @parent
	 - Heath / Safety
@stop

@section('content')
	<h1>Health / Safety</h1>
	<div class="list-group">
		<div class="alert alert-danger" role="alert">
	  		<a href="/heathTips" class="alert-link">
	  			<h4><span class="glyphicon glyphicon-exclamation-sign"></span> Tips for avoiding Ebola</h4>
				<p>
					Protect youself against Ebola; learn the symptoms and how to avoid getting infected.
				</p>
	  		</a>
		</div>
		<div class="alert alert-warning" role="alert">
	  		<a href="/ebolaSpread" class="alert-link">
	  			<h4><span class="glyphicon glyphicon-exclamation-sign"></span> New  policies implemented as Ebola spreads</h4>
				<p>
					Ebola spreads to Guinea, Liberia, Nigeria and Sierra Leone, UN says.
				</p>
	  		</a>
		</div>
	</div>
	<div class="">Last updated Sept. 21, 2014</div>
@stop

@section('navbar_lis')
	<li><a href="/">Information</a></li>
	<li class="active"><a href="/health">Health / Safety</a></li>
	<li><a href="/tools">Tools</a></li>
	<li><a href="/login">Community</a></li>
@stop