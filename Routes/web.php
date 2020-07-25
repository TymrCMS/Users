<?php

Route::middleware(['web','auth'])->namespace('Tymr\Modules\Users\Controllers')->group( function() {
        
    //{username?} is an optional param
    Route::get('Users/profile/{username?}', 'ProfileController@index')->name('users.profile');  
    Route::get('Users/edit-profile/', 'ProfileController@edit')->name('users.edit-profile');
    Route::post('Users/edit-profile', 'ProfileController@update')->name('users.edit-profile.submit');

    // Users dashboard
    Route::get('Users/dashboard', 'DashboardController@index')->middleware(['permission:dashboard-access'])->name('users.dashboard');

    // Admin only users
    Route::get('Admin/dashboard', 'Admin\DashboardController@index')->middleware(['permission:admin-dashboard-access'])->name('users.admin-dashboard');


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
    //Route::resource('Admin/users/roles', 'Admin\RolesController')->middleware(['permission:admin-roles'])->only(['store','destroy']);

    //
    // Roles
    //
    Route::resource('Admin/users/roles', 'Admin\RolesController')->middleware(['permission:roles-read']); //User must have at least to read access, thenm in controller we control the (r)cud-access
    Route::resource('Admin/users/roles', 'Admin\RolesController')->middleware(['permission:roles-create|roles-update|roles-delete'])->except(['index']);

    //
    // Permissions
    //
    Route::resource('Admin/users/permissions', 'Admin\PermissionsController')->middleware(['permission:permissions-read']);
    Route::resource('Admin/users/permissions', 'Admin\PermissionsController')->middleware(['permission:permissions-create|permissions-update|permissions-delete'])->except(['index']);

    //
    // Users
    //
    Route::resource('Admin/users/users', 'Admin\UsersController')->middleware(['permission:users-read']);
    Route::resource('Admin/users/users', 'Admin\UsersController')->middleware(['permission:users-create|users-update|users-delete'])->except(['store','destroy']);


    //
    // User Permissions
    //
    Route::get('Admin/users/user/{user}/permissions', 'Admin\UserPermissionsController@viewPermissions')->middleware(['permission:users-read'])->name('users.user-permissions');
    Route::put('Admin/users/user/{user}/permissions', 'Admin\UserPermissionsController@savePermissions')->middleware(['permission:users-create|users-update|users-delete'])->name('users.user-permissions.update');


    //
    // User Groups
    //
    // Route::resource('Admin/users/groups', 'Admin\GroupsController')->middleware(['permission:users-read'])->only(['store','destroy']);
    // Route::resource('Admin/users/groups', 'Admin\GroupsController')->middleware(['permission:users-create|users-update|users-delete'])->except(['store','destroy']);

});
