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
      $teams = Teamusers::with('user')->with('tname')->get();
      
      //dd($teams);
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
        $users = User::pluck('name', 'id');
        //dd($users);
        $teamusers = Teamusers::all();
        $teamNames = Teams::distinct()->get('name');
        return view('teams.create', compact('users','teamusers','teamNames'));
      }
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
      $input = $request->all();
           
      if( $input['existing_name'] != null && $input['new_team_name'] != null)
      {  
        $swalMsg = "Either select Name or Enter New Name";
        return redirect()->back()->with(['error'=>$swalMsg]);
      }

      if($input['existing_name'] == null )
      {
        $team_name = $input['new_team_name'];
        unset($input['existing_name']);
      }
      
      if($input['new_team_name'] == null)
      {
        $team_name = $input['existing_name'];
        unset($input['new_team_name']);
      } 
      
      //dd($team_name, $input);  

      //first create team
      $result1 = Teams::firstOrCreate(array('name' => $team_name, 
                                          'personal_team' => 1));
      
      //next create leader
      $result2 = Teamusers::firstOrCreate(array('team_id' => $result1->id, 
                                          'user_id' => $input['leader_id'], 
                                          'role' => "team_leader"));
                                          
      //create members through loop
      foreach($input['member_id'] as $row)
      {
        $member_id = $row;
        $role = "member";
        $resx = Teamusers::firstOrCreate(array(
                                          'team_id' => $result1->id, 
                                          'user_id' => $member_id, 
                                          'role' => $role));
                                          
        $email = User::where('id',$member_id)->first();

        $result3 = Teaminvitations::firstOrCreate(array('team_id' => $result1->id, 
                                          'email' => $email->email, 
                                          'role' => $role));     
      }                 
                              
      if($result1 && $result2)
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
      $team_id = $id;
      $users = User::pluck('name','id');
      //get the team name first from id
      $req = Teams::where('id', $id)->first();
      $team_name = $req->name;
      $teamNameForEdit = $req->name;
      
      $teamMembersById = Teams::where('name',$req->name)->pluck('user_id')->toArray();
      
      $teamusers = Teamusers::with('user')->whereIn('user_id', $teamMembersById)->get();
      $teamNames = Teams::distinct()->get('name');
      //dd($teamusers, $teamNames);
      return view('teams.edit', compact('team_name','team_id','users','teamusers', 'teamNames'));
      
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
      $input = $request->all();
      //everything captured. not we need to put in db.
      // same way as stored above.
      
      dd($input);
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
