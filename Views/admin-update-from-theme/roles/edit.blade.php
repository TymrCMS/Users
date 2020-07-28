@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('roles.create') }}" class='btn btn-flat btn-primary'>Create a new Role</a>
			</div>
		</div>
		<br />

	<form role="form" action="{{ route('roles.update',$role->id) }}" method="POST">
		<div class="row">

				<div class="col-md-4">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-red">
							<h3 class="widget-user-username">
								Edit:: {{ $role->display_name }}
							</h3>
							<h5 class="widget-user-desc">{{ $role->description }}</h5>
						</div>
						<div class="box-footer ">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
							<div class="form-group">
								<label>Name</label>
								@if ($role->is_core)
									<input name='name' class="form-control" type="text" placeholder="" value="{{$role->name}}" disabled=disabled>
								@else
									<input name='name' class="form-control" type="text" placeholder="" value="{{$role->name}}">
								@endif
								
							</div>

							<div class="form-group">
								<label>Display Name</label>
								<input name='display_name' class="form-control" type="text" placeholder="" value="{{$role->display_name}}">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control">{{$role->description}}</textarea>
							</div>
						</div>
						<div class="box-footer">
								
						
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-red">
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

												<input name="permissions[]" value="{{ $perm->id }}" type="checkbox" {{ $role->permissions->where('id',$perm->id)->first()  ? "checked" : "" }} />

		
											</span>
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button class='btn btn-flat bg-green'>Save</button>
				<a href="{{ route('roles.show',$role->id) }}" class='btn btn-flat btn-primary'>Cancel</a>
			</div>
		</div>
		<br />

	</form>
@endsection


@section('afterjs')
  <script>

  </script>

@endsection
