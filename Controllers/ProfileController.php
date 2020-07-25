<?php

namespace Tymr\Modules\Users\Controllers;

use View;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Tymr\Events\UserLoaded;
use Tymr\Modules\Users\Models\User;
use Tymr\Http\Controllers\PublicController;
use Tymr\Modules\Users\Requests\PublicUserProfileRequest;


class ProfileController extends PublicController
{

    public function __construct(\Tymr\Modules\Users\UsersModule $m)
    {
        parent::__construct( $m );
    }
    
    /**
     * Show profile page, able to show the users profile or others
     * 
     * @param  Request $request  [description]
     * @param  [type]  $username [description]
     * @return [type]            [description]
     */
    public function index( Request $request , $username = NULL )
    {
        // Current User
        //dd($this->user);
        $user = $this->user; // User::findOrFail( Auth::user()->id );
        $person = NULL;

        if($username === NULL || $this->user->username === $username) 
        {
            $person = $this->user;
        } 
        else
        {
            $person = User::where( 'username' , $username )->first();

            if($person === NULL)
            {
                Session::flash('error','Unable to find profile.');
                return redirect()->route('users.profile');
            }

        }

        // CallEvent UserLoaded Event to 
        // decorate the person
        event(new UserLoaded($person));


        return view('Users::profile.view')->withPerson($person);
    }



    /**
     * We share the user variable as it is needed in multiple components
     * 
     * @return [type] [description]
     */
    public function edit()
    {
        View::share(['person'=> $this->user ]);

        return view("users::profile.edit");
    }


    /**
     * This is a pre-validated update method
     * 
     * @param  UserProfileRequest $request [description]
     * @return [type]                      [description]
     */
    public function update( PublicUserProfileRequest $request )
    {
        $user = User::findOrFail( Auth::user()->id );

        $user->profile->display_name = $request->display_name;
        $user->profile->first_name = $request->first_name;
        $user->profile->last_name = $request->last_name;
        $user->profile->dob = $request->dob;
        $user->profile->gender = $request->gender;
        $user->profile->phone = $request->phone;
        $user->profile->mobile = $request->mobile;
        $user->profile->short_bio = $request->short_bio;
        $user->profile->location = $request->location;

        $user->push();

        Session::flash('success','Settings Saved.');

        return redirect()->route('users.profile');
    }
}
