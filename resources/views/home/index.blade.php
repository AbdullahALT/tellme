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
@endsection

