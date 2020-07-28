@extends('layouts.app')

@section('content')

 	<div class="box box-warning">

		<div class="box-header with-border">
			<h3 class="box-title">Create New User</h3>
		</div>

		<!-- /.box-header -->

		<div class="box-body">

			<form role="form" action="{{ route('users.store') }}" method="POST">
			{{ csrf_field() }}
				<!-- text input -->
				<div class="form-group">
					<label>Name</label>
					<input name='username' class="form-control" type="text" placeholder="Enter ...">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input name='email' class="form-control" type="email" placeholder="Email">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input name='password'class="form-control" type="password" placeholder="Password">
				</div>




				<!-- checkbox -->
				<div class="form-group">
				  <div class="checkbox">
					<label>
					  {{ Form::checkbox('active', 1, true) }}
					  Active
					</label>
				  </div>
				</div>


				<!-- select -->
				<div class="form-group">
				  <label>User Group</label>
				  <select class="form-control" name="group_id" id="group_id">
					  @foreach ($groups as $group)
					  	<option value="{{$group->id}}">{{$group->name}} ({{$group->id}})</option>
					  @endforeach
				  </select>
				</div>

				<button>Add</button>

			  </form>
			</div>
			<!-- /.box-body -->
		  </div>    

	 


@endsection
