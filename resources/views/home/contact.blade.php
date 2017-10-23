@extends('layouts.card')


@section('header', 'Contact Us')

@section('body')
	@if(Session::has('success'))
		<div class="alert alert-success">
			{{Session::get('success')}}
		</div>
	@endif
	<h1 class="card-title">
		We're here to help!
	</h1>
	<p class="card-text">
		Please feel free to report any problem you've faced, complain about anything you don't like, or for whatever reaseon you have to be here
	</p>
	<form action="{{route('contact.post')}}" method="post">
		{{csrf_field()}}
		<div class="form-group row">
			<label class="col-md-2 col-form-label" for="name">Your Name</label>
			<div class="col-md-10">
				<input class="form-control" type="text" name="name" id="name"  placeholder="Optional">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-md-2 col-form-label" for="email">Email</label>
			<div class="col-md-10">
				<input class="form-control" type="email" name="email" id="email" placeholder="Optional">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 col-form-label" for="message">Your Name</label>
			<textarea class="form-control" rows="8" name="message" id="message" required></textarea>
		</div>
		<button class="btn btn-primary">Send</button>
	</form>
@endsection