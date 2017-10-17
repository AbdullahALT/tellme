@extends('layouts.master')

@section('content')
<div class="jumbotron my-4">
	<h1 >
		Tell Me
	</h1>
	<p class="lead">What secrets will people tell you anonymously?</p>
	<hr class="my-4">
	<p class="lead">
		<a class="btn btn-dark btn-lg d-inline-block" href="{{route('login')}}" role="btn">Log in</a>
		<a class="btn btn-dark btn-lg d-inline-block" href="{{route('register')}}" role="btn">Register</a>
	</p>
</div>

<div class="row on-floor">
	<div class="col-lg-4 col-md-12 py-3">
		<h4>Recive messages</h4>
		<p>People may have something to tell you, they are just shy to say it in your face</p>
	</div>
	<div class="col-lg-4 col-md-12 py-3">
		<h4>Response to messages</h4>
		<p>No need for sharing what you recived on twitter, you might get unfollowed</p>
	</div>
	<div class="col-lg-4 col-md-12 py-3">
		<h4>Delete messages</h4>
		<p>Oh crap this message is hating me! I'll just delete it and nothing has happend</p>
	</div>
</div>
@endsection

