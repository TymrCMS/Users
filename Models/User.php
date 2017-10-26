<?php

namespace Tymr\Modules\Users\Models;

use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use LaratrustUserTrait;

    use SoftDeletes;

    protected $table = 'users_users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profile()
    {
        return $this->hasOne(\Tymr\Modules\Users\Models\UserProfile::class,'id');
    } 


    public function group()
    {
        return $this->belongsTo(\Tymr\Modules\Users\Models\Group::class);
    } 

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($model) 
        {
            // Probably lazy load these relationships to avoid lots of queries?
            $model->load([ 'profile' ]);

            $model->profile()->delete();

        });
    }

}
