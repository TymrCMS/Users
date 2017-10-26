<?php

namespace Tymr\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class PermissionsRequest extends FormRequest
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

        if(Request::isMethod('post')) {
            return [
                'name'          => 'required|max:100|unique:users_permissions',
                'display_name'  => 'required|max:100|unique:users_permissions',
                'description'   => 'sometimes|max:255',
            ];  
        }
        
        return [
                'name'          => 'required|max:100|unique:users_permissions,id,:id',
                'display_name'  => 'required|max:100|unique:users_permissions,id,:id',
                'description'   => 'sometimes|max:255',
        ];  
   
    }

    public function messages()
    {
        return [
            'name.required'             => 'A Name is required',
            'display_name.required'     => 'A Display Name is required',
        ];
    }

}