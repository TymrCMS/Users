<?php

namespace Tymr\Modules\Users\Controllers;

use Auth;
use Illuminate\Http\Request;
use Tymr\Http\Controllers\PublicController;

class DashboardController extends PublicController
{

	public function __construct( \Tymr\Modules\Users\UsersModule $m )
	{
		parent::__construct( $m );
	}

	public function index(Request $request)
	{
		return view("users::dashboard.default");
	}

}
