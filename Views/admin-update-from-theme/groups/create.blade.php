@extends('layouts.app')

@section('content')

 	<div class="box box-warning">

		<div class="box-header with-border">
			<h3 class="box-title">Create New Group</h3>
		</div>

		<!-- /.box-header -->

		<div class="box-body">

			<form role="form" action="{{ route('groups.store') }}" method="POST">
				{{ csrf_field() }}
				<!-- text input -->
				<div class="form-group">
					<label>Name</label>
					<input name='name' class="form-control" type="text" placeholder="Enter Name">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control"></textarea>
				</div>

				<button class='btn btn-flat btn-primary'>Add Group</button>
				<a href="{{ route('groups.index') }}" class='btn btn-flat btn-default'>Cancel</a>

			  </form>
			</div>
			<!-- /.box-body -->
		  </div>    

	 


@endsection
