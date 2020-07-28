@extends('layouts.app')


@section('content')


		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('roles.create') }}" class='btn btn-flat btn-primary'>Create a new Role</a>
			</div>
		</div>
		<br />


	<div class="row">

		

@foreach ($roles as $role)
			<div class="col-md-4">
				
				<div class="box box-widget widget-user">
					<div class="widget-user-header bg-aqua">
						<h3 class="widget-user-username">
							{{ $role->display_name }}
						</h3>
						<h5 class="widget-user-desc">{{ $role->description }}</h5>
					</div>
					<div class="box-footer no-padding">
						<ul class="nav nav-stacked">


							<li><a href="#">Name / Slug <span class="pull-right">{{ $role->name }}</span></a></li>


							<li><a href="#">User Count <span class="pull-right badge bg-yellow">{{ $role->users()->count()}}</span></a></li>
							<li><a href="#">Permissions Assigned <span class="pull-right badge bg-aqua">{{ $role->permissions()->count()}}</span></a></li>


						</ul>
					</div>
					<div class="box-footer">

							<a class="btn btn-sm btn-flat btn-default" href="{{ route('roles.show',$role->id) }}"><span class="pull-right">View</span></a>
						@if(!$role->is_core)	
						{{ Form::open(['style'=>'display:inline', 'method'  => 'delete','route' => ['roles.destroy',$role->id]]) }}
							{{ Form::submit('Delete', ['style'=>'display:inline','class' => 'pull-right btn btn-sm btn-flat btn-danger confirm']) }}
						{{ Form::close() }}	
						@endif
					</div>
				</div>
				
			</div>
			@endforeach
	   
			

								
								

			</div>
		
		<br />	
		<div class="row">
			<div class="col-md-12">
				{{ $roles->links() }}
			</div>
		</div>
		


@endsection


@section('afterjs')

	<script>
	</script>

@endsection
