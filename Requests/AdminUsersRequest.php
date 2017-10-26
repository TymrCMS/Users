<?php

namespace Tymr\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class AdminUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // permissions are already set on routes
        // so we can simply by-pass this
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        //url structure
        //Admin/users/permissions/create

        // store
        // http://tymr.app/Admin/users/permissions/create
        if(Request::isMethod('post')) {
            return [
                'username'  => 'required|max:255|unique:users_users',
                'email'     => 'required|email|unique:users_users',
                'password'  => 'sometimes|max:500',
                'group_id'  => 'required|numeric',
                'active'    => 'sometimes',

            ];  
        }

        // put
        return [
            'username'  => 'required|max:255|unique:users_users,id,:id',
            'email'     => 'required|max:500|email|unique:users_users,id,:id',
            'password'  => 'sometimes|max:500',
            'group_id'  => 'required|numeric',
            'active'    => 'sometimes',
        ];  
   
    }


}