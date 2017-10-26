<?php

namespace Tymr\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserProfile extends Model
{
    use SoftDeletes;

    protected $table = 'users_user_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
        'display_name',
        'last_name', 
        'first_name', 
        'dob',
        'gender',
        'phone',
        'mobile',
        'short_bio',
    ];

    public function user()
    {
        return $this->belongsTo(\Tymr\Modules\Users\Models\User::class);
    }

}
