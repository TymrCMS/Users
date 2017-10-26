<?php

namespace Tymr\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class GroupsRequest extends FormRequest
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
                'name'          => 'required|max:100|unique:users_roles',
                'description'   => 'sometimes|max:255',
            ];  
        }
        

        return [
            'name'          => 'sometimes|max:100|unique:users_roles,id,:id',
            'description'   => 'sometimes|max:255',
        ];  
   
    }


}