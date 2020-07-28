@extends('layouts.app')


@section('aftercss')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap.css') }}">

@endsection

@section('content')

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">All Users</h3>
					<span class='pull-right'>
						<a href="{{ route('users.create') }}" class='btn btn-flat btn-primary'>Create</a>
					</span>
				</div>
				<div class="box-body">
					<table id="users_table" class="table table-bordered table-striped table-condensed">
					<thead>
							<tr>
								<th>Id</th>
								<th>Username</th>
								<th>Email</th>
								<th>Group</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Display Name</th>
								<th>Actions</th>
							</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td> {{ $user->id }} </td>
								<td> {{ $user->username }} </td>
								<td> {{ $user->email }} </td>
								<td> {{ $user->group->name }} </td>
								<td> {{ $user->profile->first_name }} </td>
								<td> {{ $user->profile->last_name }} </td>
								<td> {{ $user->profile->display_name }} </td>
								<td>
									<a class='btn btn-sm btn-flat btn-default' href="{{ route('users.show',$user->id) }}">View</a>
									<a class='btn btn-sm btn-flat btn-default' href="{{ route('users.user-permissions',$user->id) }}">Permissions</a>
									@unless($user->is_core)
										{{ Form::open(['style'=>'display:inline', 'method'  => 'delete','route' => ['users.destroy',$user->id]]) }}
											{{ Form::submit('Delete', ['style'=>'display:inline','class' => 'btn btn-sm btn-flat btn-danger confirm']) }}
										{{ Form::close() }}
									@endunless
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th colspan='8'>
								<span class='pull-left'>
									{{ $users->links() }}
								</span>
							</th>
						</tr>
					</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection


@section('afterjs')

    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

@endsection
