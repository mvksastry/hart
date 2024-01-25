<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	//isAdmin middleware lets only users with a 
	//specific permission permission to access these resources
	public function __construct() 
	{
    $this->middleware(['auth']);
    $this->controller = "User";
    // $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
    // $this->middleware('permission:user-create', ['only' => ['create','store']]);
    // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
    // $this->middleware('permission:user-delete', ['only' => ['destroy']]);        
  }
	
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Get all users and pass it to the view
    $users = User::where('name','<>','director director')->get(); 
    //dd($users);
    return view('users.index')->with('users', $users);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    //Get all roles and pass it to the view
    $roles = Role::pluck('name', 'id');
    $perms = Permission::pluck('name', 'id');
    //dd($roles, $perms);
    return view('users.create', ['roles'=>$roles, 'perms'=>$perms]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
    //Validate name, email and password fields
    $this->validate($request, [
      'name'=>'required|max:120',
      'email'=>'required|email|unique:users',
      'password'=>'required|min:6|confirmed'
    ]);
    //Retrieving only the email and password data
    $input = $request->only('email', 'name', 'password');
    $input['password'] = Hash::make($input['password']);

    $user = User::create($input); 

    $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
    if (isset($roles)) 
    {
      foreach ($roles as $role) {
        $role_r = Role::where('id', '=', $role)->firstOrFail();            
        $user->assignRole($role_r); //Assigning role to user
      }
    }        
    //Redirect to the users.index view and display message
    return redirect()->route('users.index')
      ->with('flash_message',
      'User successfully added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
  //dd($id);
  //return redirect('users'); 
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //Get user with specified id		
    $user = User::with(['roles'])->where('id', $id)->first(); 

    // get all inherited permissions for that user
    $permsUser = $user->getAllPermissions();
        
    //Get all roles
    $roles = Role::pluck('name', 'id'); 
    
    //Get all permissions
    $perms = Permission::pluck('name', 'id'); 
    
    //pass user and roles data to view
    return view('users.edit', compact('user', 'roles', 'perms','permsUser')); 
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
    
    //change only when new password is filled.
    //otherwise new added or removed roles will be changed

    //validate
    $this->validate($request, [
      'name'=>'required|max:120',
      'email'=>'required|email|unique:users,email,'.$id,
      'password'=>'nullable|min:6|confirmed'
    ]);
  
    //Retreive the name, email and password fields
    $input = $request->only(['name', 'email', 'password']);
    //dd($input);
    //Get user by id		
    $user = User::findOrFail($id); 
  
    //Retreive all roles
    $roles = $request['roles']; 
    
    $permissions = $request['perms']; 
    
    
    //Hash the password, change only of new pw filled
    if ($input['password'] != null)
    {
      $input['password'] = Hash::make($input['password']);
      //save the user data
      $user->fill($input)->save();
    }

    //verify the supplied and retrieved data
    //dd($id, $user, $input, $roles);
    if(isset($roles)) 
    {   
      //If one or more role is selected associate user to roles 
      $user->roles()->sync($roles);           
    }        
    else {
      //If no role is selected remove all
      //exisiting role associated to a user 
      //except for admin himself.
      if( Auth::user()->hasRole('admin') )
      {
        
      }
      else {
        $user->roles()->detach(); 
      }
    }
    
    if(isset($permissions)) 
    {   
      //If one or more role is selected associate user to roles 
      //$user->syncPermissions($perms); 
      $res = $user->givePermissionTo($permissions);
    }        
    else {
      //If no role is selected remove all
      //exisiting role associated to a user 
      //except for admin himself.
      if( Auth::user()->hasRole('admin') )
      {
        
      }
      else {
        $user->permissions()->detach(); 
      }
    }   
    
    
      // all work done return
      return redirect()->route('users.index')
      ->with('flash_message',
      'User successfully edited.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
    //Find a user with a given id and delete
    $user = User::findOrFail($id); 
    //$user->delete();
    session()->flash("danger", "User Deleted!");
    return redirect()->route('users.index')
      ->with('flash_message',
      'User not deleted.');
  }
}
