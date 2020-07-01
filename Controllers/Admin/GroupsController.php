<?php

namespace Tymr\Modules\Users\Controllers\Admin;

//use Validator;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tymr\Http\Controllers\AdminController;
use Tymr\Modules\Settings\Models\Settings;
use Tymr\Modules\Users\Models\Group;
use Tymr\Modules\Users\Requests\GroupsRequest;

class GroupsController extends AdminController
{

    public function __construct(\Tymr\Modules\Users\UsersModule $m)
	{
		parent::__construct( $m );
	}

	public function index()
	{

		$perpage = Settings::where('slug','results_per_page')->first()->value;

		$groups = Group::orderBy('id','asc')->paginate($perpage);
		
		return view("Users::groups.index")->withGroups($groups);
	}


	public function create()
	{ 
		return view("Users::groups.create");
	}

	public function store(GroupsRequest $request)
	{
		$group = new Group();
		$group->name = $request->name;
		$group->description = $request->description;

		if($group->save())
		{
			Session::flash('success', 'Group has been created.');
			return redirect()->route('groups.show',$group->id);
		}

		Session::flash('error','Error creating group');
		return redirect()->route('groups.create');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Group $group)
	{        
		return view("Users::groups.show")->withGroup($group);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Group $group)
	{
		return view("Users::groups.edit")->withGroup($group);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Group $group)
	{ 
		$group->name = Input::get('name'); 
		$group->description = Input::get('description');

		if($group->save())
		{
			Session::flash('success', 'Successfully updated group!');
			return redirect()->route('groups.show',$group->id);
		}

		Session::flash('error','Error saving group');
		return redirect()->route('groups.edit',$group->id);       
	}

	/**
	 * @todo  Do not allow deletion of a group is a user is assigned to it
	 * 
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function destroy(Group $group)
	{	
		//first count, if users is larger than 0 then do not delete
		if($group->users)
		{
			Session::flash('error','You can not delete this group.');
			return redirect()->route('groups.edit',$id);
		}
		
		if($group->delete())
		{
			Session::flash('success','Succesfully removed group from system.');            
		}

		return redirect()->route('groups.index');
	}
}
