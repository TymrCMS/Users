<?php

namespace Tymr\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class RolesRequest extends FormRequest
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
        // store
        // http://tymr.app/Admin/users/permissions/create
        if(Request::isMethod('post')) {
            return [
                'name'          => 'required|max:100|unique:users_roles',
                'display_name'  => 'required|max:255|unique:users_roles',
                'description'   => 'sometimes|max:255',
            ];  
        }
        
        return [
            'name'          => 'sometimes|max:100|unique:users_roles,id,:id',
            'display_name'  => 'required|max:255|unique:users_roles,id,:id',
            'description'   => 'sometimes|max:255',
            'permissions'   => 'sometimes',
        ];  
   
    }

}