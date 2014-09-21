<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
		@section('title')
			Project Seed
		@show
	</title>
    <link href="{{ asset('resources/css/libs/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/libs/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  <body>

  	@if(Session::get('flash_message'))
			<div class="alert {{ Session::get('alert_class', 'alert-info') }} alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				{{ Session::get('flash_message') }}
			</div>
		@endif

		{{-- If there are any errors with the input, give the user a warning --}}
		@if (count($errors) != 0)
			@foreach($errors->all() as $message)
				<div class="alert alert-danger alert-dismissable" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				{{ $message }} <br>
			</div>		
			@endforeach
		@endif

		<nav class="navbar @section('navbar_class') navbar-default @show" role="navigation">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">
		      	@section('brand')
			      	<span class="glyphicon glyphicon-leaf"></span>
			      	<span>Project Seed</span>
			    @show
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse">
		      <ul class="nav navbar-nav">
		      	@section('navbar_lis')
  					<li><a href="/">Information</a></li>
  					<li><a href="/health">Health / Safety</a></li>
		        	<li><a href="/tools">Tools</a></li>
		        	<li><a href="/community/signup">Community</a></li>
		        @show
		    	</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			@yield('content')
		</div>
		<div class="text-center">
		<hr>
		<span class="glyphicon glyphicon-tree-conifer"></span>
		<span class="glyphicon glyphicon-tree-deciduous"></span>
		<span class="glyphicon glyphicon-tree-conifer"></span>
		<span class="glyphicon glyphicon-tree-deciduous"></span>
		<span class="glyphicon glyphicon-tree-conifer"></span>
		<span class="glyphicon glyphicon-tree-deciduous"></span>
		<span class="glyphicon glyphicon-tree-conifer"></span>
		<span class="glyphicon glyphicon-tree-deciduous"></span>
		<span class="glyphicon glyphicon-tree-conifer"></span>
		<span class="glyphicon glyphicon-tree-deciduous"></span>
		<span class="glyphicon glyphicon-tree-conifer"></span>
		<hr>
	</div>
    <script type="text/javascript" src="{{ asset('resources/js/libs/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('resources/js/libs/bootstrap.min.js') }}"></script>
  </body>
</html>