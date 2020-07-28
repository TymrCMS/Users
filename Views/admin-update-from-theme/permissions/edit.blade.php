@extends('layouts.app')

@section('content')

 	<div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Permission <small>{{$permission->display_name}}</small></h3>
			<span class='pull-right'>
				<a href="{{ route('permissions.show',$permission->id) }}" class='btn btn-flat btn-primary'>Cancel</a>
			</span>				
		</div>
		<div class="box-body">
			<form permission="form" action="{{ route('permissions.update',$permission->id) }}" method="POST">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<div class="form-group">
					<label>Name / Slug</label>
					@if ($permission->is_core)
						<input name='name' readonly="readonly" class="form-control" type="text" placeholder="" value="{{$permission->name}}">
					@else
						<input name='name' class="form-control" type="text" placeholder="" value="{{$permission->name}}">
					@endif
					
				</div>
				<div class="form-group">
					<label>Display Name</label>
					<input name='display_name' class="form-control" type="text" placeholder="" value="{{$permission->display_name}}">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control">{{$permission->description}}</textarea>
				</div>
				<button class='btn btn-flat bg-green'>Save</button>
			</form>
		</div>
	</div>    

@endsection
