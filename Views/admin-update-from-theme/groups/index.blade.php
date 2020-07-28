@extends('layouts.app')


@section('content')


		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('groups.create') }}" class='btn btn-flat btn-primary'>Create a new group</a>
			</div>
		</div>
		<br />


	<div class="row">

		

@foreach ($groups as $group)
			<div class="col-md-4">
				
				<div class="box box-widget widget-user">
					<div class="widget-user-header bg-aqua">
						<h3 class="widget-user-username">
							{{ $group->name }}
						</h3>
						<h5 class="widget-user-desc">{{ $group->description }}</h5>
					</div>
					<div class="box-footer no-padding">
						<ul class="nav nav-stacked">


							<li><a href="#">Name<span class="pull-right">{{ $group->name }}</span></a></li>


							<li><a href="#">yyyy<span class="pull-right badge bg-yellow">yyyyyy</span></a></li>
							<li><a href="#">xxxxxxx <span class="pull-right badge bg-aqua">xxxxx</span></a></li>


						</ul>
					</div>
					<div class="box-footer">

							<a class="btn btn-sm btn-flat btn-default" href="{{ route('groups.show',$group->id) }}"><span class="pull-right">View</span></a>
{{-- 						@if(!$group->is_core)	
						{{ Form::open(['style'=>'display:inline', 'method'  => 'delete','route' => ['groups.destroy',$group->id]]) }}
							{{ Form::submit('Delete', ['style'=>'display:inline','class' => 'pull-right btn btn-sm btn-flat btn-danger confirm']) }}
						{{ Form::close() }}	
						@endif --}}
					</div>
				</div>
				
			</div>
			@endforeach
	   
			

								
								

			</div>
		
		<br />	
		<div class="row">
			<div class="col-md-12">
				{{ $groups->links() }}
			</div>
		</div>
		


@endsection


@section('afterjs')

	<script>
	</script>

@endsection
