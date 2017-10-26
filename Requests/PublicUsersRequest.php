<?php

namespace Tymr\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Tymr\Modules\Users\Models\User;
use Auth;

class PublicUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        // 1. Check that the existing user is that of the one updating details
        // Get the username and find the user
        $a_user = User::where('username',Request::post('profile'))->first();
        
        if(Auth::user()->id != $a_user->id) {
            //send session message
            return redirect()->route('users.profile');
        }
        
        // store
        // http://tymr.app/Admin/users/permissions/create
        if(Request::isMethod('post')) {
            return [
                'username'  => 'required|max:255|unique:users_users',
                'email'     => 'required|email|unique:users_users',
                'password'  => 'sometimes|max:500',
            ];  
        }

        // put
        return [
            'username'  => 'required|max:255|unique:users_users,id,:id',
            'email'     => 'required|max:500|email|unique:users_users,id,:id',
            'password'  => 'sometimes|max:500',
        ];  
    }

}
