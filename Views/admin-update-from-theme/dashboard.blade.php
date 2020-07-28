@extends('layouts.app')

@section('content')
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">
			Admin Dashboard
		</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<table class="table">
			<tr>
				<td>
					Total System Users
				</td>
				<td>
					{{ $user->username }}
				</td>                            
			</tr>                    
			<tr>
				<td>
					Email
				</td>
				<td>
					{!! $user->email !!}
				</td>                            
			</tr>
			<tr>
				<td>
					ID
				</td>
				<td>
					{!! $user->id !!}
				</td>                            
			</tr>
		</table>
	</div>
	<div class="box-footer">
		Footer
	</div>
</div>


	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Your details</div>

				<div class="panel-body">

					<table class="table">
						<tr>
							<td>
								Name
							</td>
							<td>
								{{ $user->username }}
							</td>                            
						</tr>                    
						<tr>
							<td>
								Registered Email
							</td>
							<td>
								{{ $user->email }}
							</td>                            
						</tr>
						<tr>
							<td>
								ID
							</td>
							<td>
								{!! $user->id !!}
							</td>                            
						</tr>
					</table>

				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Admin Dashboard</div>

				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					<table class="table">
						<tr>
							<td>
								Name
							</td>
							<td>
								{!! $user->username !!}
							</td>                            
						</tr>                    
						<tr>
							<td>
								Email
							</td>
							<td>
								{!! $user->email !!}
							</td>                            
						</tr>
						<tr>
							<td>
								ID
							</td>
							<td>
								{!! $user->id !!}
							</td>                            
						</tr>
					</table>

				</div>
			</div>
		</div>        
	</div>

@endsection
