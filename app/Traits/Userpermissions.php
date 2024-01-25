<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

trait Userpermissions
{
	public function userRolesByUserId($id)
	{
		$user = User::find($id);
		return $user->roles;
	}
	
	public function userPermissionsByUserId($id)
	{
		$user = User::find($id);
		$permissionNames = $user->getPermissionNames(); // collection of name strings
		
		//$permissions = $user->permissions;
		return $permissionNames;
	}
	
	// this function always checks for permission name for the
	// committee id. if anyone is a member of another committee
	// it should not be touched.
	public function revokeCommitteePermissions($collection);
	{
		if( count($collection) > 0 )
		{
			foreach($collection as $key => $val)
			{
				dd($collection);
			}
		}
	}
	
	public function assignPermission($permission_name, $id)
	{
		$user = Auth::find($id);
		
		if( !$user->hasPermissionTo($permission_name) )
		{	
			$user->givePermissionTo($permission_name);
		}
		return true;
	}
	
}