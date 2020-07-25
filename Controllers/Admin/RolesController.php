<?php

namespace Tymr\Modules\Users\Controllers\Admin;


use Redirect;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use Tymr\Http\Controllers\AdminController;
use Tymr\Modules\Settings\Models\Settings;
use Tymr\Modules\Users\Models\User as User;
use Tymr\Modules\Users\Models\Role as Role;
use Tymr\Modules\Users\Models\Permission as Permission;
use Tymr\Modules\Users\Requests\RolesRequest;


class RolesController extends AdminController
{

    public function __construct(\Tymr\Modules\Users\UsersModule $m)
    {
        parent::__construct( $m );
    }


    /**
     * Display and paginate all roles available in the system
     * 
     * @return View 
     */
    public function index()
    {
        $perpage = Settings::where('slug','results_per_page')->first()->value;

        $roles = Role::orderBy('id','asc')->paginate($perpage);
        
        return view("users::roles.index")->withRoles($roles);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view("users::roles.create");
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(RolesRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;

        // is_core is set by default on the table, however.. its best to explicitly set it
        // so we know when we are debugging..        
        $role->is_core = false;

        if($role->save())
        {
            Session::flash('message', 'Successfully created role.');
            return redirect()->route('roles.show',$role->id);
        }

        Session::flash('message','Error saving role');
        return redirect()->route('roles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {        
        $permissions = Permission::all();

        return view("users::roles.show")->withRole($role)->withPermissions($permissions);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view("users::roles.edit")->withRole($role)->withPermissions($permissions); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        if(!$role->is_core) 
        {
            $role->name = Request::input('name'); 
        }  

        $role->display_name = Request::input('display_name'); 
        $role->description = Request::input('description');

        if($role->save())
        {
            if ($request->permissions) 
            {
                $role->syncPermissions($request->permissions);
            }
            else 
            {
                //remove all permissions
                $role->syncPermissions([]);
            }

            Session::flash('success', 'Successfully updated role!');
            return redirect()->route('roles.show',$role->id);
        }

        Session::flash('error','Error saving role');
        return redirect()->route('roles.edit',$role->id);
    }

    /**
     * @todo  Do not allow deletion of a role is a user is assigned to it
     * 
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy(Role $role)
    {   
        if($role->is_core)
        {
            Session::flash('error','You can not delete this role.');
            return redirect()->route('roles.edit',$id);
        }
        
        if($role->delete())
        {
            Session::flash('success','Succesfully removed role from system.');            
        }

        return redirect()->route('roles.index');
    }
}
