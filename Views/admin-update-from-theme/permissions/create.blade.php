@extends('layouts.app')

@section('content')

 	<div class="box box-warning">

		<div class="box-header with-border">
			<h3 class="box-title">Create New Permission</h3>
		</div>

		<!-- /.box-header -->

		<div class="box-body">

			<form role="form" action="{{ route('permissions.store') }}" method="POST">
				{{ csrf_field() }}
				<!-- text input -->
				<div class="form-group">
					<label>Name / Slug</label>
					<input name='name' class="form-control" type="text" placeholder="Enter Name">
				</div>
				<div class="form-group">
					<label>Display Name</label>
					<input name='display_name' class="form-control" type="text" placeholder="Enter Display Name">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control"></textarea>
				</div>

				<button>Create New Permission</button>

			  </form>
			</div>
			<!-- /.box-body -->
		  </div>    

	 


@endsection
