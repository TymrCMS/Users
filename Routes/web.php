<?php

Route::middleware(['web','auth'])->namespace('Tymr\Modules\Users\Controllers')->group( function() {
        
    //{username?} is an optional param
    Route::get('Users/profile/{username?}', 'ProfileController@index')->name('users.profile');  
    Route::get('Users/edit-profile/', 'ProfileController@edit')->name('users.edit-profile');
    Route::post('Users/edit-profile', 'ProfileController@update')->name('users.edit-profile.submit');

    // Users dashboard
    Route::get('Users/dashboard', 'DashboardController@index')->middleware(['permission:access-dashboard'])->name('users.dashboard');

    // Admin only users
    Route::get('Admin/dashboard', 'Admin\DashboardController@index')->middleware(['permission:access-admin-dashboard'])->name('users.admin-dashboard');


    /**
     * Roles & Permissions
     * 
     * Section: Admin
     *
     * Roles:: 
     *      - admin     - can Create Delete
     *      - manage    - index,edit,update
     *
     * Permissions      - manage only (no deleting or creating)
     */
    Route::resource('Admin/users/roles', 'Admin\RolesController')->middleware(['permission:admin-roles'])->only(['store','destroy']);
    Route::resource('Admin/users/roles', 'Admin\RolesController')->middleware(['permission:admin-roles|manage-roles'])->except(['store','destroy']);
    Route::resource('Admin/users/permissions', 'Admin\PermissionsController')->middleware(['permission:manage-permissions'])->except(['store','destroy']);



    /**
     * Manage Users 
     *
     * Section: Admin
     */
    Route::resource('Admin/users/users', 'Admin\UsersController')->middleware(['permission:admin-users']);
    Route::resource('Admin/users/users', 'Admin\UsersController')->middleware(['permission:manage-users'])->except(['store','destroy']);

    /**
     * Edit the permissions on a specific User
     */
    Route::get('Admin/users/user/{user}/permissions', 'Admin\UserPermissionsController@viewPermissions')->middleware(['permission:admin-users'])->name('users.user-permissions');
    Route::put('Admin/users/user/{user}/permissions', 'Admin\UserPermissionsController@savePermissions')->middleware(['permission:admin-users'])->name('users.user-permissions.update');

    Route::resource('Admin/users/groups', 'Admin\GroupsController')->middleware(['permission:admin-users'])->only(['store','destroy']);
    Route::resource('Admin/users/groups', 'Admin\GroupsController')->middleware(['permission:admin-users|manage-users'])->except(['store','destroy']);

});
