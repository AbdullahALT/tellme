@extends('layouts.master')

@section('content')

	@include('partials.profile')

	<div class="row">

		<div id="message-write" class="col-md-12 col-lg-6 order-lg-2 order-md-1">
			@if($errors->has('content'))
				<div class="alert alert-danger">
					<strong>Failed: </strong> {{$errors->first('content')}}
				</div>
			@endif
			@if(Session::has('success'))
				<div class="alert alert-success">
					{{Session::get('success')}}
				</div>
			@endif
			<form action="{{route('message.create')}}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="user_id" value="{{$user->id}}">
				<div class="form-group">
					<textarea class="form-control" name="content" id="content" placeholder="Tell me something" rows="8"></textarea>
					<div class="form-check">
					{{-- <label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="visibility" value="private">
						Send as private 
					</label> --}}
				</div>
				</div>
				
				<button type="submit" class="btn btn-dark">Submit</button> 
			</form>
		</div>

		<div id="message-list" class="col-md-12 col-lg-6 order-lg-1 order-md-2">
			@if(count($messages) == 0)
				<div class="alert alert-secondary">
					There is no messages for you yet! 
				</div>
			@endif
			@foreach($messages as $message)
				@include('partials.message')
			@endforeach
			{{$messages->links()}}
		</div>

	</div>

@endsection