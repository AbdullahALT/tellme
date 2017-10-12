

<div id="profile" class="row bg-light">
		<div id="profile-image" class="col-md-12 col-lg-2 nopadding">
			<img class="img-fluid" src="{{URL::to('image/users/bravely-default.jpg')}}">
		</div>

		<div id="profile-info" class="col-md-12 col-lg-10 d-flex align-content-center flex-wrap">
			<div class="row">
				<div id="profile-username" class="col-md-12">
					<h4>{{$user->name}}</h4>
				</div>
			</div>
			<div class="row">
				<div id="profile-description" class="col-md-12">
					<span> Computer science, gaming, and everything anime. Those are the ingredients you need to create a clone of me </span>
				</div>
			</div>
		</div>
</div>

