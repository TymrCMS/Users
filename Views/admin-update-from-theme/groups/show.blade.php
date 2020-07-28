@extends('layouts.app')


@section('content')


		<div class="row">
			<div class="col-md-12">
				<a href="{{ route('groups.create') }}" class='btn btn-flat btn-primary'>Create a new group</a>
			</div>
		</div>
		<br />

		<div class="row">

			
				<div class="col-md-4">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-aqua">
							<h3 class="widget-user-username">
								View:: {{ $group->name }}
							</h3>
							<h5 class="widget-user-desc">{{ $group->description }}</h5>
						</div>
						<div class="box-footer no-padding">
							<ul class="nav nav-stacked">
								<li><a href="#">Name / Slug <span class="pull-right">{{ $group->name }}</span></a></li>
								<li><a href="#">User Count <span class="pull-right badge bg-yellow">{{ $group->users()->count()}}</span></a></li>
								<li><a href="#">Last Updated <span class="pull-right badge bg-aqua">{{ ($group->created_at!=null) ?$group->created_at->toFormattedDateString():'' }}</span></a></li>
								<li><a href="#">Date Created <span class="pull-right badge bg-aqua">{{ ($group->created_at!=null) ?$group->created_at->toFormattedDateString():'' }}</span></a></li>
		
							</ul>
						</div>
						<div class="box-footer">


								<a class="btn btn-sm btn-flat btn-default" href="{{ route('groups.edit',$group->id) }}"><span class="pull-right">Edit</span></a>
								<a href="{{ route('groups.index')}}">&larr;- Back to groups</a>

						</div>
					</div>
				</div>

	   
		</div>
			
												

												

								



@endsection

@section('afterjs')
  <script>
  	



  </script>

@endsection
