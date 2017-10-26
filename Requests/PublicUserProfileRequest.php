<?php

namespace Tymr\Modules\Users\Requests;

use Auth;
use Illuminate\Http\Request;
use Tymr\Modules\Users\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Tymr\Modules\Users\Requests\PublicUsersRequest;

/**
 * The user profile Request class is used for the public
 * site for end-users to be able to edit their own details.
 * Validation is completed on certain fields and other restricted compared to that of the AdminUserProfileRequest
 */
class PublicUserProfileRequest extends PublicUsersRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return parent::rules() + [
            'display_name'      => 'required|max:255|',    
            'first_name'        => 'required|max:255|',
            'last_name'         => 'required|max:255|',
            'dob'               => 'sometimes|nullable|date',
            'gender'            => 'sometimes|max:255|',
            'phone'             => 'sometimes|max:255|',
            'mobile'            => 'sometimes|max:255|',
            'short_bio'         => 'sometimes|max:255|',  
            'location'          => 'sometimes|max:255|',  
        ];  
   
    }


}