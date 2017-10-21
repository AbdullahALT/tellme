@extends('layouts.master')

@section('styles')
<style type="text/css">
	.background {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: url(../image/errors/500.gif) 50% no-repeat;
		background-position-x: 50%;
		background-position-y: center;
		background-size: cover;
		z-index: -1;
		opacity: .2;
	}

	.error-message {
		color: rgba(255,255,255,.75);
	}

	.error-message h1 {
		font-size: 144px;
		font-weight: 100;
	}

	.error-message p {
		font-size: 1.25rem;
	}

	body {
		background-color: #343A40;
	}

</style>
@endsection

@section('content')

<div class="background">

</div>

<div class="row">
	<div class="col-md-12">	
		<div class="error-message text-center mt-5">
				<h1>Error</h1>
				<h2><strong>it's... it's our fault!</strong></h2>
		</div>
	</div>
</div>
<div class="row d-flex justify-content-center">
	<div class="col-md-12 col-lg-8">
		<div class="error-message text-center">
			<p>Something wrong has happend while we proccessed your request. please contact us if you need help or want to report this failure. </p>
			<p>
				Error Code: 500, Server Side Failure
			</p>
		</div>
	</div>
</div>
<div class="row d-flex justify-content-center">
	<div class="col-md-12 col-lg-8">
		<div class="error-message text-center">
			<a class="btn btn-primary" href="#"> Contact Us </a>
			<a class="btn btn-primary" href="{{route('home')}}">Home Page</a>
		</div>
	</div>
</div>
@endsection