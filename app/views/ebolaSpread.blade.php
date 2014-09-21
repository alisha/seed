@extends('_master')

@section('title')
	 @parent
	 - Ebola Outbreak
@stop

@section('content')
	<div class="alert alert-warning" role="alert">
		<h3>Important Information about the Ebola Outbreak</h3>
	</div>
	<div>
		<h4>New Heath guidelines for Guinea, Liberia, Nigeria and Sierra Leone</h4>
		<ol>
	  		<li>Avoid the bodies of those who recently died of Ebola</li>
	  		<li>Stay away from animals that can carry the virus, like bats and monkeys</li>
	  		<li>Avoid contact with the body fluids of a visibly infected person</li>
		</ol>
	</div>
	<div class="">Last updated Sept. 21, 2014</div>
	
@stop

@section('navbar_lis')
	<li><a href="/">Information</a></li>
	<li class="active"><a href="/health">Health / Safety</a></li>
	<li><a href="/tools">Tools</a></li>
	<li><a href="/login">Community</a></li>
@stop