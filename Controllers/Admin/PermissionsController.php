<?php

namespace Tymr\Modules\Users\Controllers\Admin;

use Validator;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Tymr\Http\Controllers\AdminController;
use Tymr\Modules\Settings\Models\Settings;
use Tymr\Modules\Users\Models\User as User;
use Tymr\Modules\Users\Models\Permission as Permission;
use Tymr\Modules\Users\Requests\PermissionsRequest;


class PermissionsController extends AdminController
{

    public function __construct(\Tymr\Modules\Users\UsersModule $m)
	{
		parent::__construct( $m );
	}

	public function index()
	{
		$perpage = Settings::where('slug','results_per_page')->first()->value;

		$permissions = Permission::orderBy('id','asc')->paginate($perpage);

		return view("Users::permissions.index")->withPermissions($permissions);
	}


	public function create()
	{ 
		return view("Users::permissions.create");
	}


	public function show(Permission $permission)
	{
		return view("Users::permissions.show")->withPermission($permission);
	}


	public function edit(Permission $permission)
	{
		return view("Users::permissions.edit")->withPermission($permission);
	}

	public function update(PermissionsRequest $request, $id)
	{
		$permission = Permission::find($id);
		$permission->display_name = $request->display_name; //  Input::get('display_name'); 
		$permission->description = $request->description; //Input::get('description');

		if($permission->save())
		{
			Session::flash('success', 'Successfully updated permission!');
			return redirect()->route('permissions.show',$permission->id);
		}

		Session::flash('error','Error saving permission');
		return redirect()->route('permissions.edit',$permission->id);
	}

}
