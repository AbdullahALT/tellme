

<div id="profile" class="row bg-light">
		<div id="profile-image" class="col-md-12 col-lg-2 nopadding">
			<img class="img-fluid" src="{{ URL::to('image/users/' . $user->avatar)}}">
		</div>

		<div id="profile-info" class="col-md-12 col-lg-10 d-flex align-content-center flex-wrap">
			{{-- Display user's name in the left if large, center otherwise --}}
				<div class="d-none d-lg-block" dir="auto">
					<h4>{{$user->name}}</h4>
				</div>
				<div class="w-100 d-lg-none d-block text-center" dir="auto">
					<h4>{{$user->name}}</h4>
				</div>
				<div class="w-100" dir="auto">
					<p> {{$user->bio}}</p>
				</div>
				
		</div>
</div>

