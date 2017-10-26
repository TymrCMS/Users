<?php

namespace Tymr\Modules\Users;

use Tymr\Models\Module;

class UsersModule extends Module
{
    public $info = [
        'name'          => 'Users',
        'description'   => 'Users Module',
        'version'       => '1.0',
        'slug'          => 'users',
    ];

    public function info() : array
    {
        return $this->info;
    }

    public function help() : string
    {
        return "No help documentation supplied.";
    }
}
