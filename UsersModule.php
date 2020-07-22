<?php

namespace Tymr\Modules\Users;

use Tymr\Models\Module;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Database\Migrations\Migration;


class UsersModule extends Module
{
    public $info = [
        'name'          => 'Users',
        'description'   => 'Users Module',
        'version'       => '1.0.0',
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

    public function install()
    {
        $status = \Tymr\Modules\Navigation\Models\AvailableLinks::firstOrCreate(
			['title'       => 'Profile'],
			[
                'description' => 'User profile',
			    'icon'        => 'fa fa-circle-o text-aqua',
			    'type'        => 'uri',
			    'url'         => 'Users/profile',
			    'order'       => 100,
			    'permission'  => 'update-profile|deactivate-profile',
			    'module'      => $this->info['slug'],
			    'data'        => '',
			    'css_id'      => '',
                'css_class'   => ''
            ]
        );

        return true;
    }

    public function uninstall()
    {
        \Tymr\Modules\Navigation\Models\AvailableLinks::where('module',$this->info['slug'])->delete();

        return true;
    }
}
