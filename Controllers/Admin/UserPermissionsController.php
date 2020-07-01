<?php

namespace Tymr\Modules\Users\Controllers\Admin;

use Redirect;
use Illuminate\Support\Facades\Session;
use Tymr\Http\Controllers\AdminController;
use Tymr\Modules\Users\Models\User as User;
use Tymr\Modules\Users\Models\Role as Role;
use Tymr\Modules\Users\Models\Permission as Permission;
use Tymr\Modules\Users\Requests\UserPermissionsRequest;

/**
 * Allows the ability to edit the permissions on a specific user in the system.
 */
class UserPermissionsController extends AdminController
{
    public function __construct(\Tymr\Modules\Users\UsersModule $m)
    {
        parent::__construct( $m );
    }


    /**
     * Displays the list of roles and permissions for editing.
     * 
     * @param  User   $user The user we are editing
     * @return [type]       [description]
     */
    public function viewPermissions(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view("Users::users.edit-permissions",compact('user','roles','permissions'));      
    }

    /**
     * Save and update the permissions on a specific user
     * 
     * @param  UserPermissionsRequest $request Inbound request and validation
     * @param  User                   $user    The user we are updating
     * @return null                            Redirect to users page
     */
    public function savePermissions(UserPermissionsRequest $request, User $user)
    {
        if ($request->roles) 
        {
            $user->syncRoles($request->roles);
        }
        else 
        {
            //remove all permissions based roles
            $user->syncRoles([]);
        }

        if ($request->user_permissions) 
        {
            $user->syncPermissions($request->user_permissions);
        }
        else 
        {
            //remove all permissions
            $user->syncPermissions([]);
        }

        Session::flash('success', 'Successfully updated '.$user->profile->display_name.'`s permissions');
        return redirect()->route('users.user-permissions',$user->id);
    }

}
