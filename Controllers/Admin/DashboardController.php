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
        // Lets get some data for the dashboard
        //$userData = Stats::fetchUserInfo();

        return view("users::admin.dashboard");
    }
}
