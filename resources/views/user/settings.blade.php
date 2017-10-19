@extends('layouts.master')

@section('content')

<div class="row my-4 d-flex justify-content-center">
	{{-- <div class="col-lg-2 col-md-12">
		<div class="card">
			<img class="card-img-top" src="{{URL::to('image/users/' . $user->avatar )}}">
			<div class="card-body">
				
			</div>
		</div>
	</div> --}}
	<div class="col-md-8">
		<div class="card my-4">
			<div class="card-header"> Settings </div>
			<div class="card-body">
				<h5 class="card-title">Profile Info</h5>
				<hr>
				<form action="#" method="POST">
					<div class="row d-flex justify-content-center my-4">
						<div class="col-md-4">
							<img id="avatar-preview" class="img-fluid" src="{{URL::to('image/users/' . $user->avatar)}}">
							<input type="file" class="inputfile" id="avatar" name="avatar" accept="image/jpeg,image/png"> 
							<label for="avatar" class="d-block text-center py-2">
								<span>Change Avatar</span>
							</label>
						</div>
					</div>
					<div class="form-group row{{ $errors->has('name') ? ' has-danger' : '' }}">
						<label for="username" class="col-md-2 col-form-label">Username</label>
						
						<div class="col-md-10">
							<input type="text" class="form-control" maxlength="15" id="username" name="username" value="{{$user->username}}">
							
							@if($errors->has('username'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif

						</div>
					</div>

					<div class="form-group row{{ $errors->has('name') ? ' has-danger' : '' }}">
						<label for="name" class="col-md-2 col-form-label">Name</label>
						
						<div class="col-md-10">
							<input type="text" class="form-control" maxlength="30" id="name" name="name" value="{{$user->name}}">

							@if($errors->has('name'))
                                <span class="form-text">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

						</div>

					</div>

					<div class="form-group row{{ $errors->has('name') ? ' has-danger' : '' }}">
						<label for="bio" class="col-md-4 col-form-label">Bio</label>
						
						<div class="col-md-12">
							<textarea class="form-control" maxlength="300" name="bio" id="bio">{{$user->bio}}</textarea> 

							@if($errors->has('bio'))
	                            <span class="form-text">
	                                <strong>{{ $errors->first('bio') }}</strong>
	                            </span>
	                        @endif
						</div>

					</div>
				</form>

				<h5 class="card-title">Prefrences</h5>
				<hr>
				<div class="form-check">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" value="" {{$user->mail_notify == '1'? 'checked' : ''}}>
						Send me an email to notify me about new messages
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" value="" {{$user->auto_publish == '1'? 'checked' : ''}}>
						Auto publish new messages
					</label>
				</div>

				<button type="submit" class="btn btn-primary"> Save Changes </button>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	// display the photo that the user chose
	function readURL(input) {

	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#avatar-preview').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	

	$(document).ready(function(){
		$("#avatar").change(function(){
		    readURL(this);
		});
	});
</script>
@endsection