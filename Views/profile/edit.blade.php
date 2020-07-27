@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@component('users::components.profile.header-widget')
			@endcomponent
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			@component('users::components.profile.info-widget',['person'=>$person])
			@endcomponent
			@component('users::components.profile.aboutme-widget',['person'=>$person])
			@endcomponent
		</div>
		<div class="col-md-8">
			@component('users::components.profile.edit-form-widget',['person'=>$person])
			@endcomponent
		</div>		
	</div>
@endsection