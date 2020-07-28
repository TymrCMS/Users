@extends('layouts.app')

@section('content')

		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('groups.create') }}" class='btn btn-flat btn-primary'>Create a new group</a>
			</div>
		</div>
		<br />

	<form group="form" action="{{ route('groups.update',$group->id) }}" method="POST">
		<div class="row">

				<div class="col-md-4">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-red">
							<h3 class="widget-user-username">
								Edit:: {{ $group->name }}
							</h3>
							<h5 class="widget-user-desc">{{ $group->description }}</h5>
						</div>
						<div class="box-footer ">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
							<div class="form-group">
								<label>Name</label>
								@if ($group->is_core)
									<input name='name' class="form-control" type="text" placeholder="" value="{{$group->name}}" disabled=disabled>
								@else
									<input name='name' class="form-control" type="text" placeholder="" value="{{$group->name}}">
								@endif
								
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control">{{$group->description}}</textarea>
							</div>
						</div>
						<div class="box-footer">
								
						
						</div>
					</div>
				</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<button class='btn btn-flat bg-green'>Save</button>
				<a href="{{ route('groups.show',$group->id) }}" class='btn btn-flat btn-primary'>Cancel</a>
			</div>
		</div>
		<br />

	</form>
@endsection


@section('afterjs')
  <script>

  </script>

@endsection
