<!DOCTYPE HTML>

<html>

	<head>
		<title>
			@section('title')
				Project Seed
			@show
		</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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

		@yield('content')

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>

</html>