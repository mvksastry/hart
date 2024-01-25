<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//Models
use App\Models\User;
use App\Models\Group;

use App\Requests\GroupRequest;


use App\Repositories\GroupmakingRepositoryInterface;

class GroupController extends Controller
{
	use HasRoles;
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if( Auth::user()->hasRole('dean') )
		{
			//Get all users and pass it to the view					
			$groups = Group::select('groupleader_id')->with('members')
										->with('groupLeaderName')->with('memberName')
										->groupBy('groupleader_id')->get();
			return view('groups.index', compact('groups'));							
		}
		
		if( Auth::user()->hasRole('admin') )
		{
			//Get all users and pass it to the view				
			$groups = Group::select('groupleader_id')->with('members')
										->with('groupLeaderName')->with('memberName')
										->groupBy('groupleader_id')->get();
			return view('groups.index', compact('groups'));
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if( Auth::user()->hasRole('dean') )
		{
			$curGroups = Groupx::select('groupleader_id')->with('members')
										->with('groupLeaderName')->with('memberName')
										->groupBy('groupleader_id')->get();
										
			$groupleaders = User::role('supervisor')->pluck('name', 'id');
			
			$members = User::role('researcher')->pluck('name', 'id');
			return view('groups.create', compact('curGroups', 'groupleaders', 'members'));
		}
		
		if( Auth::user()->hasRole('admin') )
		{
			$curGroups = Groupx::select('groupleader_id')->with('members')
										->with('groupLeaderName')->with('memberName')
										->groupBy('groupleader_id')->get();
										
			$groupleaders = User::role('employee')->pluck('name', 'id');
			
			$members = User::role('employee')->pluck('name', 'id');	
			return view('groups.create', compact('curGroups', 'groupleaders', 'members'));
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
		//Retrieving only the email and password data
		$input = $request->validated();
			
		$result = $this->gmri->makeGroup($input);
				   
			//Redirect to the users.index view and display message
		return redirect()->route('groups.index')
          ->with('flash_message',
          'Grouping successfully done.');
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
		if( Auth::user()->hasRole('dean') )
		{
			$groupleader = User::role('supervisor')->pluck('name', 'id');
			$members = User::role('researcher')->pluck('name', 'id');			
			return view('groups.edit', compact('groupleader', 'members'));	
		}
		
		if( Auth::user()->hasRole('admin') )
		{
			$groupleader = User::role('employee')->pluck('name', 'id');
			$members = User::role('researcher')->pluck('name', 'id');			
			return view('groups.edit', compact('groupleader', 'members'));
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
		//Retrieving only the email and password data
		$input = $request->validated();
			
		$result = $this->gmri->makeGroup($input);
			   
		//Redirect to the users.index view and display message
		return redirect()->route('groups.index')
						->with('flash_message','Grouping successfully done.');
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
