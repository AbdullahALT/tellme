@extends('layouts.master')

@section('content')
<div class="jumbotron my-4">
	<h1 >
		Tell Me
	</h1>
	<p class="lead">What secrets will people tell you anonymously?</p>
	<hr class="my-4">
	<p>This application is only built to prove its creator skills on job interviews. No guarantee this application will countinoue its life for long and no guarantee for your information recovery. please note that before registering and using Tell Me</p>
	@if(!Auth::check())
		<p class="lead">
			<a class="btn btn-dark btn-lg d-inline-block" href="{{route('login')}}" role="btn">Log in</a>
			<a class="btn btn-dark btn-lg d-inline-block" href="{{route('register')}}" role="btn">Register</a>
		</p>
	@endif
</div>

<div class="row on-floor">
	<div class="col-lg-4 col-md-12 py-3">	
		<img src="{{URL::to('image/icons/ic_message.png')}}" class="img-fluid d-inline">
		<h5 class="d-inline">Recive messages</h5>
		<p>People may have something to tell you, they are just shy to say it in your face</p>	
	</div>
	<div class="col-lg-4 col-md-12 py-3">	
		<img src="{{URL::to('image/icons/ic_response.png')}}" class="img-fluid d-inline">
		<h5 class="d-inline">Response to messages</h5>
		<p>No need for sharing what you recived on twitter, you might get unfollowed</p>
	</div>
	<div class="col-lg-4 col-md-12 py-3">
		<img src="{{URL::to('image/icons/ic_delete.png')}}" class="img-fluid d-inline">
		<h5 class="d-inline">Delete messages</h5>
		<p>Oh crap this message is hating me! I'll just delete it and nothing has happend</p>
	</div>
</div>



@endsection

