			  <div class="box box-solid">

				  	<div class="box-header with-border">
				  		<h3 class="box-title">Update my details</h3>
				  	</div>

				  	<div class="box-body box-solid">
			
						<form class="form-horizontal" role="form" action="{{ route('users.edit-profile.submit') }}" method="POST">
							{{ csrf_field() }}		
							 
							 <input class="" name="profile" id="profile" type="hidden" value="{{$person->username}}">

						  <div class="form-group">
							<label class="col-sm-2 control-label" for="username">User Name</label>
							<div class="col-sm-10">
							  <input class="form-control" id="username" name="username" disabled="disabled" type="text" placeholder="Display Name (public)" value="{{$person->username}}">
							</div>
						  </div>


						  <div class="form-group">
							<label class="col-sm-2 control-label" for="display_name">Display Name</label>
							<div class="col-sm-10">
							  <input class="form-control" id="display_name" name="display_name" type="text" placeholder="Display Name (public)" value="{{$person->profile->display_name}}">
							</div>
						  </div>						
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="first_name">First Name</label>
							<div class="col-sm-10">
							  <input class="form-control" id="first_name" name="first_name" type="text" placeholder="First Name" value="{{$person->profile->first_name}}">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="last_name">Last Name</label>
							<div class="col-sm-10">
							  <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Last Name" value="{{$person->profile->last_name}}">
							</div>
						  </div>					  
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="email">Email</label>
							<div class="col-sm-10">
							  <input class="form-control" id="email" name="email" disabled='disabled' type="email" placeholder="Email" value="{{$person->email}}">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="dob">DOB</label>
							<div class="col-sm-10">
							  <input class="form-control" id="dob" name="dob" type="date" placeholder="DOB" value="{{$person->profile->dob}}">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="location">Location</label>
							<div class="col-sm-10">
							  <input class="form-control" id="location" name="location" type="text" placeholder="Location" value="{{$person->profile->location}}">
							</div>
						  </div>						  
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="gender">Gender</label>
							<div class="col-sm-10">
							  <input class="form-control" id="gender" name="gender" type="text" placeholder="Gender" value="{{$person->profile->gender}}">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="phone">Phone</label>
							<div class="col-sm-10">
							  <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone" value="{{$person->profile->phone}}">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="mobile">Mobile</label>
							<div class="col-sm-10">
							  <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Mobile" value="{{$person->profile->mobile}}">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" for="short_bio">Bio</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="short_bio" name="short_bio" placeholder="Bio" >{{$person->profile->short_bio}}</textarea>
							</div>
						  </div>						  					  
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <div class="checkbox">
								<label>
								  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
								</label>
							  </div>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button class="btn btn-danger btn-flat" type="submit">Update</button>
							</div>
						  </div>
						{{Form::close()}}
					
					</div>
			  </div>