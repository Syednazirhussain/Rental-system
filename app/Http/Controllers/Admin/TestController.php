<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;


class TestController extends AppBaseController
{
	public function addRole($name)
    {
    	Role::create(['name' => $name]);
    }

	public function addPermission($name)
    {
    	Permission::create(['name' => $name]);
    }

    public function assignRoleToUser($user_id,$role)
    {
    	
    	$user =  User::find($user_id);

    	// role can be assigned to any user
		// $user->assignRole($role);

		//role can be removed from a user:
		// $user->removeRole($role);

    	//user has a certain role
		dd($user->hasRole($role));

    	//determine if a user has any of a given list of roles
		// dd($user->hasAnyRole(Role::all()));

    }

    public function assignPermissionToUser($user_id,$permission)
    {
    	$user =  User::find($user_id);

    	// Single Permission
    	// $user->givePermissionTo($permission);


    	// Assign Multiple permisson to user by Id
    	// You may also pass an array
		// $user->givePermissionTo(['module','payment','setting','newletter','companies','invoices']);

    	// permission can be revoked from a user
		// $user->revokePermissionTo($permission);


		// dd($user->can(3));

		// return $user;
    }


    public function assignPermissionToRole($role,$permission)
    {
    	$role = Role::findByName($role);
    	$role->givePermissionTo($permission);
    }





}