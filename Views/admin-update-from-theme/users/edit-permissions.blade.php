@extends('layouts.app')

@section('content')
<form role="form" action="{{ route('users.user-permissions.update',$user->id) }}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-6">
              <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Fields</h3>
                    </div>
                    <div class="box-body box-solid">
                        <table class="table">
                            <tr>
                                <td>ID</td>
                                <td>{{$user->id}}</td>
                            </tr>                            
                            <tr>
                                <td>UserName</td>
                                <td>{{$user->username}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Display Name</td>
                                <td>{{$user->profile->display_name}}</td>
                            </tr>   
                            <tr>
                                <td>First Name</td>
                                <td>{{$user->profile->first_name}}</td>
                            </tr> 
                            <tr>
                                <td>Last Name</td>
                                <td>{{$user->profile->last_name}}</td>
                            </tr>                                                                              
                        </table>                                
                    </div>
              </div>
        </div>
    </div>
    <!-- End profile fields -->

    <div class="row">

        <div class="col-md-4">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-red">
                    <h3 class="widget-user-username">
                        Role Based Permissions
                    </h3>
                </div>                  
                <div class="box-footer">
                    <ul class="nav nav-stacked">
                        @foreach ($roles as $role)
                            <li>
                                <a href="#">{{$role->display_name}} 
                                    <span class="pull-right">

                                        <input name="roles[]" value="{{ $role->id }}" type="checkbox" {{ $user->roles->where('id',$role->id)->first()  ? "checked" : "" }} />

                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-red">
                    <h3 class="widget-user-username">
                        User Based Permissions
                    </h3>
                </div>                  
                <div class="box-footer">
                    <ul class="nav nav-stacked">
                        @foreach ($permissions as $perm)
                            <li>
                                <a href="#">{{$perm->display_name}} 
                                    <span class="pull-right">

                                        <input name="user_permissions[]" value="{{ $perm->id }}" type="checkbox" {{ $user->permissions->where('id',$perm->id)->first()  ? "checked" : "" }} />

                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua">
                    <h3 class="widget-user-username">
                        Current Effective Permissions
                    </h3>
                </div>                  
                <div class="box-footer">
                    <ul class="nav nav-stacked">

                        @foreach ($permissions->toArray() as $perm)
                        <?php $found = ' ';?>
                        <?php foreach ($user->allPermissions()->toArray() as $owns):
                            if ($owns['name'] == $perm['name']):
                                $found = ' checked';
                                break;                                  
                            endif;
                         endforeach; ?>

                            <li>
                                <a href="#">
                                    {{$perm['display_name']}} 
                                    <span class="pull-right">
                                        <input disabled=disabled name="" value="" type="checkbox" <?= $found;?> />  
                                    </span>
                                </a>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>  
    </div>

    <button class="btn btn-primary btn-flat">Save</button>
    <a href="{{ route('users.show',$user->id) }}" class='btn btn-flat btn-primary'>Cancel</a>
                       
</form>
@endsection
