@extends('layouts.master')

@section('content')

	@include('partials.profile')

	<div class="row">

		<div id="message-write" class="col-md-12 col-lg-6 order-lg-2 order-md-1">
			<form action="#" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<textarea class="form-control" name="message" id="message" placeholder="Tell me something" rows="8"></textarea>
					<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="private" value="private">
						Send as private 
					</label>
				</div>
				</div>
				
				<button type="submit" class="btn btn-dark">Submit</button> 
			</form>
		</div>

		<div id="message-list" class="col-md-12 col-lg-6 order-lg-1 order-md-2">
			@include('partials.message')
			@include('partials.message')
			@include('partials.message')
			@include('partials.message')
			@include('partials.message')
		</div>

	</div>

@endsection