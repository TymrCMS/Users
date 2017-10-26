<?php

namespace Tymr\Modules\Users\Models;

use Laratrust\LaratrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends LaratrustRole
{
    use SoftDeletes;
}
