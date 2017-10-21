@extends('layouts.master')

@section('styles')
<style type="text/css">
	.background {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: url(../image/errors/404.gif) 50% no-repeat;
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
				<h1>404</h1>
				<h2><strong>Page Not Found</strong></h2>
		</div>
	</div>
</div>
<div class="row d-flex justify-content-center">
	<div class="col-md-12 col-lg-8">
		<div class="error-message text-center">
			<p>{{$exception->getMessage()}}</p>
		</div>
	</div>
</div>
@endsection