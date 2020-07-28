@extends('layouts.app')


@section('content')

      <div class="row">
        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">
              <h3 class="box-title">Manage Permissions</h3>
              <span class='pull-right'>
              
              </span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="permissions_table" class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th class='hidden-xs hidden-sm'>Id</th>
                        <th>Display Name</th>
                        <th>Name/Slug</th>
                        <th class='hidden-xs hidden-sm'>Description</th>
                        <th class='hidden-xs hidden-sm hidden-md'>Created</th>
                        <th class='hidden-xs hidden-sm'>Updated</th>
                        <th>
                            <span class="pull-right">
                                Actions
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class='hidden-xs hidden-sm'>{{ $permission->id }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->name }}</td>
                            <td class='hidden-xs hidden-sm'>{{ $permission->description }}</td>
                            <td class='hidden-xs hidden-sm hidden-md'>{{ ($permission->created_at != null)?$permission->created_at->toFormattedDateString():'' }}</td>
                            <td class='hidden-xs hidden-sm'>{{ ($permission->updated_at != null)?$permission->updated_at->toFormattedDateString():'' }}</td>
                            <td>
                                <span class="pull-right">
                                <a class='btn btn-sm btn-flat btn-default' href="{{ route('permissions.show',$permission->id) }}">View</a>                          
                      
                            </span>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan='6'>
                            <span class='pull-left'>
                                {{ $permissions->links() }}
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

    <script>
    </script>

@endsection
