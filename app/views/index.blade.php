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
		<hr>
		<p>
			Lo-fi McSweeney's bespoke chambray, try-hard fanny pack Schlitz Truffaut Carles fashion axe Tumblr freegan Thundercats Pinterest Wes Anderson. Skateboard Thundercats Echo Park Tumblr, vegan kitsch blog Kickstarter. Kitsch butcher freegan, photo booth gluten-free slow-carb wayfarers before they sold out mumblecore literally distillery shabby chic Portland. Selfies kitsch occupy, Echo Park ennui brunch trust fund artisan actually. Sriracha bicycle rights Tonx gastropub McSweeney's iPhone. Sustainable gastropub selvage roof party messenger bag yr, locavore ugh letterpress. Lo-fi bitters deep v, asymmetrical synth banjo PBR Bushwick +1.
		</p>
		<p>
			Cornhole photo booth cardigan organic, fashion axe blog hashtag pork belly VHS tousled 90's yr squid gastropub art party. Cardigan iPhone polaroid, Kickstarter shabby chic jean shorts drinking vinegar. Tousled Neutra Truffaut scenester pour-over, Brooklyn Carles squid. Cornhole plaid Etsy, meggings wayfarers kale chips ugh four loko. Echo Park Intelligentsia skateboard High Life keffiyeh Blue Bottle. Paleo fingerstache kogi mixtape locavore keytar. 90's Thundercats keytar, Vice chillwave Etsy mixtape PBR next level Brooklyn.
		</p>

@stop