<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\DB;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class RoleController extends Controller
{
	public function __construct() {
		//$this->middleware(['auth']); 
        //$this->middleware(['auth', 'isAdmin']);
		//isAdmin middleware lets only users with a 
		//specific permission permission to access these resources
//    $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
//    $this->middleware('permission:role-create', ['only' => ['create','store']]);
//    $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//    $this->middleware('permission:role-delete', ['only' => ['destroy']]);

  }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      $roles = Role::orderBy('id', 'DESC')->paginate(15);//Get all roles
      return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
      $permissions = Permission::pluck('name', 'id');//Get all permissions
      return view('roles.create', compact('permissions'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validate name and permissions field
    
      $this->validate($request, [
          'name'=>'required|unique:roles|max:10',
          'permissions' =>'required|array',
      ]);
        
      $perms = $request['permissions'];

      $name = $request['name'];
      dd($perms, $name); 
      //$role = new Role();
      //$role->name = $name;
      //$role->save();
      
      $role = Role::create(['name' => $request->input('name')]);
      $role->syncPermissions($request->input('permissions'));
   
      // Looping thru selected permissions
      //foreach ($perms as $permission) 
      //{
      //   $p = Permission::where('id', '=', $permission)->firstOrFail(); 
      // Fetch the newly created role and assign permission
      //    $role = Role::where('name', '=', $name)->first(); 
      //    $role->givePermissionTo($p);
      //}

      return redirect()->route('roles.index')
            ->with('flash_message',
             'Role'. $role->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $role = Role::find($id);
      $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', 'permissions.id')
                        ->where('role_has_permissions.role_id',$id)
                        ->get();
    
      return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $role = Role::findOrFail($id);
      $permissions = Permission::pluck('name', 'id');
      $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
    
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
      //dd($role, $permissions);
      //return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
      $this->validate($request, [
        'name'=>'required',
        'permissions' =>'required|array|between:1,50',
      ]);
      
      $role = Role::findOrFail($id);//Get role with the given id
      
      $curPerms = $role->permissions;

      foreach($curPerms as $row)
      {
        $curPermId[] = $row->id;
      }
      
      $permSelected = $request['permissions'];    

      $diffPerms = array_diff($permSelected, $curPermId);
      
      $permNames = Permission::whereIn('id', $diffPerms)->pluck('name');
        
      $role->givePermissionTo($permNames); 
        
      $newSyncedPerms = $role->permissions;
      
      //dd($curPermId, $permSelected, $diffPerms, $permNames, $newSyncedPerms);
     
      return redirect()->route('roles.index')
          ->with('flash_message',
           'Role'. $role->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $role = Role::findOrFail($id);
      $role->delete();

      return redirect()->route('roles.index')
            ->with('flash_message',
             'Role deleted!');
    }
}
