<?php

namespace App\Http\Controllers;
//Importing laravel-permission models
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

//models
use Auth;
use App\Models\Teams;
use App\Models\Teamusers;
use App\Models\Teaminvitations;
use App\Models\User;

use App\Http\Requests\TeamsRequest;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
      $teams = Teams::with('user')->with('team_role')->get();
      return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if( Auth::user()->hasAnyRole(['admin','director']) )
      {
        $users = User::pluck('name','id');
        $teamusers = Teamusers::all();
        $teamNames = Teams::distinct('name')->get();
        //dd($teamNames->count());
        //$roles = Role::pluck('name','id');
        //dd($roles);
        return view('teams.create', compact('users','teamusers', 'teamNames'));
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamsRequest $request)
    {
        //
      $input = $request->all();
           
      if(array_key_exists("existing_name", $input))
      {
        $curr_name = $input['existing_name'];
      }
      
      if(array_key_exists("new_team_name", $input))
      {
        $new_name = $input['new_team_name'];
      }   
      
      if( $curr_name != null && $new_name != null)
      {  
        $swalMsg = "Either select Name or Enter New Name";
        return redirect()->back()->with(['error'=>$swalMsg]);
      }
         
      //first check whether in the same data present or not
      $user = User::where('id', $input['user_id'])->first();
      
      $result1 = Teams::firstOrCreate(array('name' => $team_name, 
                                          'user_id' => $input['user_id'], 
                                          'personal_team' => 1));
                                          
      $result2 = Teamusers::firstOrCreate(array('team_id' => $result1->id, 
                                          'user_id' => $input['user_id'], 
                                          'role' => $input['role']));
                                          
      $result3 = Teaminvitations::firstOrCreate(array('team_id' => $result1->id, 
                                          'email' => $user->email, 
                                          'role' => $input['role']));                                    
                                          
      if($result1)
      {
        $swalMsg = "New Team Created !";
        return redirect()->route('teams.index')->with(['success'=>$swalMsg]);
      }
      else {
        $swalMsg = "New Team Creation Failed";
        return redirect()->back()->with(['error'=>$swalMsg]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    }
}
