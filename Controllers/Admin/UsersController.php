<?php

namespace Tymr\Modules\Users\Controllers\Admin;

use Validator;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use Tymr\Http\Controllers\AdminController;
use Tymr\Modules\Settings\Models\Settings;
use Tymr\Modules\Users\Models\User as User;
use Tymr\Modules\Users\Models\Role as Role;
use Tymr\Modules\Users\Models\Group as Group;
use Tymr\Modules\Users\Requests\AdminUsersRequest;
use Tymr\Modules\Users\Requests\AdminUserProfileRequest;
use Tymr\Modules\Users\Models\Permission as Permission;

class UsersController extends AdminController
{

    public function __construct(\Tymr\Modules\Users\UsersModule $m)
    {
        parent::__construct($m);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = Settings::where('slug','results_per_page')->first()->value;
        
        $users = User::orderBy('id','desc')->paginate($perpage);

        return view("Users::users.index")->withUsers($users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();

        return view("Users::users.create")->withGroups($groups);
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(AdminUsersRequest $request)
    {

        $user = new User();
        $user->username = $request->username;

        $user->email = $request->email;
        $user->last_login = null;
        $user->group_id = $request->group_id;
        $user->active = ($request->active)?true:false;
        $user->is_core = false;
        $user->can_disable = true;

        //perhaps we can send an email to the user with the password ?
        $password = \Tymr\Core\Security\PasswordGenerator::Create();

        if($request->has('password') && !empty($request->password))
        {
            $password = $request->password;
        }

        $user->password = bcrypt($password);

        if($user->save())
        {
            $userProfile = new \Tymr\Modules\Users\Models\UserProfile();
            $userProfile->user_id = $user->id;
            $userProfile->display_name = $user->username;
            $userProfile->first_name = $user->username;
            $userProfile->last_name = $user->username;
            $userProfile->dob = null;
            $userProfile->gender = null;
            $userProfile->phone = null;
            $userProfile->mobile = null;
            $userProfile->dob = null;
            $userProfile->user()->associate($user);            
            $userProfile->save();

            Session::flash('message', 'Successfully created user!');
            return redirect()->route('users.show',$user->id);
        }

        Session::flash('message','Error saving user');
        return redirect()->route('users.create');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $groups = Group::pluck('name', 'id');

        return view("Users::users.show")->withUser($user)->withGroups($groups);          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $groups = Group::pluck('name', 'id');

        return view("Users::users.edit")->withUser($user)->withGroups($groups);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserProfileRequest $request, User $user)
    {
        // store
        $user->username = $request->username; 
        
        $user->email = $request->email; 

        
        if($request->password !== null)
        {
            if(\Tymr\Core\Security\PasswordValidator::check($request->password))
            {
                $user->password = bcrypt($request->password);
            }
            else
            {
                Session::flash('error','Password not valid');
                return redirect()->route('users.edit',$user->id);
            }
        }

        // check to see if the user can be disabled.
        // some users are core/system users and 
        // their accounts can not be disabled 
        // by the user interface.
        $user->active = ($user->can_disable) ? $request->active : true ;

        if($user->save())
        {
            // Save user profile fields
            $user->profile->display_name = $request->display_name;
            $user->profile->first_name = $request->first_name;
            $user->profile->last_name = $request->last_name;
            /*
            $user->profile->dob = $request->dob;
            $user->profile->gender = $request->gender;
            $user->profile->phone = $request->phone;
            $user->profile->mobile = $request->mobile;
            $user->profile->short_bio = $request->short_bio;
            $user->profile->location = $request->location;
            */

            $user->push();

            Session::flash('success', 'Successfully updated the User');
            return redirect()->route('users.show',$user->id);
        }

        Session::flash('error','Error saving user, however validation passed');
        return redirect()->route('users.edit',$user->id);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->is_core) 
        {
            Session::flash('error','Can not delete this user.');
            return redirect()->route('users.index');
        }

        //else
        $user->delete();

        return redirect()->route('users.index');
    }
}
