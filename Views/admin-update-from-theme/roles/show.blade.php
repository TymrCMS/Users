@extends('layouts.app')


@section('content')


		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('roles.create') }}" class='btn btn-flat btn-primary'>Create a new Role</a>
			</div>
		</div>
		<br />

		<div class="row">

			
				<div class="col-md-4">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-aqua">
							<h3 class="widget-user-username">
								View:: {{ $role->display_name }}
							</h3>
							<h5 class="widget-user-desc">{{ $role->description }}</h5>
						</div>
						<div class="box-footer no-padding">
							<ul class="nav nav-stacked">
								<li><a href="#">Name / Slug <span class="pull-right">{{ $role->name }}</span></a></li>
								<li><a href="#">User Count <span class="pull-right badge bg-yellow">{{ $role->users()->count()}}</span></a></li>
								<li><a href="#">Permissions Assigned <span class="pull-right badge bg-aqua">{{ $role->permissions()->count()}}</span></a></li>
								<li><a href="#">Last Updated <span class="pull-right badge bg-aqua">{{ $role->created_at->toFormattedDateString() }}</span></a></li>
								<li><a href="#">Date Created <span class="pull-right badge bg-aqua">{{ $role->created_at->toFormattedDateString() }}</span></a></li>
		
							</ul>
						</div>
						<div class="box-footer">


								<a class="btn btn-sm btn-flat btn-default" href="{{ route('roles.edit',$role->id) }}"><span class="pull-right">Edit</span></a>
								<a href="{{ route('roles.index')}}">&larr;- Back to Roles</a>

						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-aqua">
							<h3 class="widget-user-username">
								Permissions
							</h3>
						</div>					
						<div class="box-footer">
							<ul class="nav nav-stacked">
								@foreach ($permissions as $perm)
									<li>
										<a href="#">{{$perm->display_name}} 
											<span class="pull-right">

												<input name="permissions[]" disabled=disabled value="{{ $perm->id }}" type="checkbox" {{ $role->permissions->where('id',$perm->id)->first()  ? "checked" : "" }} />

		
											</span>
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
		   
		</div>
			
												

												

								



@endsection

@section('afterjs')
  <script>
  	


	$(function() {

		var checkedItems = {!!$role->permissions->pluck('id') !!};

	});


  </script>

@endsection
