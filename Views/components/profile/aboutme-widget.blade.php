		<div class="box box-solid">
			<div class="box-header with-border">
			  <h3 class="box-title">About Me</h3>
			</div>
			<div class="box-body">

				@if (  $person->profile->short_bio != "")
					<strong><i class="fa fa-book margin-r-5"></i> Bio</strong>
					<p class="text-muted">
						{{ $person->profile->short_bio }}
					</p>
					<hr>
				@endif

				@if (  $person->profile->location != "")
					<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
					<p class="text-muted">
						{{ $person->profile->location }}
					</p>
					<hr>
				@endif

				@if (  $person->profile->gender != "")
					<strong><i class="fa fa-user margin-r-5"></i> Gender</strong>
					<p class="text-muted">
						{{ $person->profile->gender }}
					</p>
					<hr>
				@endif

				@if (  $person->profile->phone != "")
					<strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
					<p class="text-muted">
						{{ $person->profile->phone }}
					</p>
					<hr>
				@endif

				@if (  $person->profile->mobile != "")
					<strong><i class="fa fa-phone margin-r-5"></i> Mobile</strong>
					<p class="text-muted">
						{{ $person->profile->mobile }}
					</p>
					<hr>
				@endif

				@if (  $person->profile->dob != "")
					<strong><i class="fa fa-phone margin-r-5"></i> DOB</strong>
					<p class="text-muted">
						{{ $person->profile->dob }}
					</p>
					<hr>
				@endif

				@if (  $person->email != "")
					<strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
					<p class="text-muted">
						{{ $person->email }}
					</p>
					<hr>
				@endif
			</div>
		</div>