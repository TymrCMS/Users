@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">{!! $user->username !!}'s Dashboard</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                {!! $user->profile->display_name !!} 
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
                                Group
                            </td>
                            <td>
                                {!! $user->group_id !!}
                            </td>                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection