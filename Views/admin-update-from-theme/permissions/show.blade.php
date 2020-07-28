@extends('layouts.app')

@section('content')

 	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">View Permission <small>{{$permission->display_name}}</small></h3>
			<span class='pull-right'>
				<a href="{{ route('permissions.edit',$permission->id) }}" class='btn btn-flat btn-primary'>Edit</a>
			</span>			
		</div>
		<div class="box-body">
			<div class="form-group">
				<label>Name / Slug</label>
				<input name='name' class="form-control" type="text" placeholder="" disabled value="{{$permission->name}}">
			</div>
			<div class="form-group">
				<label>Display Name</label>
				<input name='display_name' class="form-control" type="email" placeholder="" disabled value="{{$permission->display_name}}">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" disabled>{{$permission->description}}</textarea>
			</div>
			<div class="form-group">
				<a href="{{route('permissions.index')}}" class="">&larr;- Back to all permissions</a>
			</div>			
		</div>
	</div>

@endsection
