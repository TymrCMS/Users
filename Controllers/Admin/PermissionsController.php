<?php

namespace Tymr\Modules\Users\Controllers\Admin;

use Validator;
use Redirect;
// Removed since upgrade to L6.x
//use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Tymr\Http\Controllers\AdminController;
use SettingsHelper;
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
		$perpage = SettingsHelper::value('results_per_page');

		$permissions = Permission::orderBy('id','asc')->paginate($perpage);

		return view("users::permissions.index")->withPermissions($permissions);
	}


	public function create()
	{ 
		return view("users::permissions.create");
	}


	public function show(Permission $permission)
	{
		return view("users::permissions.show")->withPermission($permission);
	}


	public function edit(Permission $permission)
	{
		return view("users::permissions.edit")->withPermission($permission);
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
