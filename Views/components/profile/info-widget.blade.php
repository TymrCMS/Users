	<div class="box box-solid">
		<div class="box-header with-border">
			<h3 class="box-title">Profile</h3>
		</div>
		<div class="box-body box-profile">

			{!! Gravatar($person->email,['size'=>25,'class'=>"profile-user-img img-responsive img-circle", 'alt'=>'User profile picture']) !!}

			<h3 class="profile-username text-center">{!! $person->profile->display_name !!}</h3>

			<p class="text-muted text-center">{!! $person->profile->first_name !!}</p>

			<ul class="list-group list-group-unbordered">

			</ul>

		</div>
	</div>