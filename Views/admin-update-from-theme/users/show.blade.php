@extends('layouts.app')

@section('content')


				<div class="row">
						<div class="col-md-4">
								<div class="box box-warning">
										<div class="box-header with-border">
												<h3 class="box-title">User</h3>
												<span class='pull-right'>
														<a class="btn btn-flat btn-success" href="{{route('users.edit',$user->id)}}">Edit</a>
														<a href="{{ route('users.index') }}" class='btn btn-flat btn-primary'>All Users</a>
												</span>
										</div>
										<div class="box-body">

														<div class="form-group">
																<label>UserName</label>
																<input name='username' class="form-control" type="text" disabled placeholder="" value="{{$user->username}}">
														</div>
														<div class="form-group">
																<label>Email</label>
																<input name='email' class="form-control" type="email" disabled placeholder="" value="{{$user->email}}">
														</div>
														<div class="form-group">
																<label>Password</label>
																<input name='password'class="form-control" type="password" disabled placeholder="Password">
														</div>
														<div class="form-group">
																<div class="checkbox">
																		<label>

																				{{ Form::checkbox('active', 1, $user->active,['disabled=disabled']) }}

																				Active
																		</label>
																</div>
														</div>
													<div class="form-group">
														<label>User Group</label>

														 <?php echo Form::select('group_id', $groups, $user->group_id,['class'=>'form-control','disabled'=>'disabled']); ?>



													</div>
										</div>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-6">
								<div class="box box-solid">

										<div class="box-header with-border">
												<h3 class="box-title">Profile Fields</h3>
										</div>

										<div class="box-body box-solid">

												<input class="" name="profile" id="profile" type="hidden" value="{{$user->username}}">


										<div class="form-group">
														<label class="col-sm-2 control-label" for="display_name">Display Name</label>
														<div class="col-sm-10">
															<input class="form-control" id="display_name" name="display_name" disabled type="text" placeholder="Display Name (public)" value="{{$user->profile->display_name}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="first_name">First Name</label>
														<div class="col-sm-10">
															<input class="form-control" id="first_name" name="first_name" disabled type="text" placeholder="First Name" value="{{$user->profile->first_name}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="last_name">Last Name</label>
														<div class="col-sm-10">
															<input class="form-control" id="last_name" name="last_name" disabled type="text" placeholder="Last Name" value="{{$user->profile->last_name}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="dob">DOB</label>
														<div class="col-sm-10">
															<input class="form-control" id="dob" name="dob" type="date" disabled placeholder="DOB" value="{{$user->profile->dob}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="location">Location</label>
														<div class="col-sm-10">
															<input class="form-control" id="location" name="location" disabled type="text" placeholder="Location" value="{{$user->profile->location}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="gender">Gender</label>
														<div class="col-sm-10">
															<input class="form-control" id="gender" name="gender" disabled type="text" placeholder="Gender" value="{{$user->profile->gender}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="phone">Phone</label>
														<div class="col-sm-10">
															<input class="form-control" id="phone" name="phone" disabled type="text" placeholder="Phone" value="{{$user->profile->phone}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="mobile">Mobile</label>
														<div class="col-sm-10">
															<input class="form-control" id="mobile" name="mobile" disabled type="text" placeholder="Mobile" value="{{$user->profile->mobile}}">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label" for="short_bio">Bio</label>
														<div class="col-sm-10">
																<textarea class="form-control" id="short_bio" name="short_bio" disabled placeholder="Bio" >{{$user->profile->short_bio}}</textarea>
														</div>
													</div>
										</div>
								</div>
						</div>
				</div>
@endsection
