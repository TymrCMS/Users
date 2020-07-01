<?php

namespace Tymr\Modules\Users\Controllers\Admin;

use Tymr\Http\Controllers\AdminController;

class DashboardController extends AdminController
{
    public function __construct(\Tymr\Modules\Users\UsersModule $m)
    {
        parent::__construct( $m );
    }

    /**
    * Show the application 'Admins' dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view("Users::dashboard");
    }
}
