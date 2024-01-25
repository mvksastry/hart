<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
//Models
use App\Models\Leavetype;

class LeavetypeController extends Controller
{
	public function __construct() 
	{
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$leavetypes = Leavetype::with('role')->get();

		//Get all roles and pass it to the view
		$roles = Role::all();
		//dd($leavetypes);
		//pass leavetypes and roles data to view
		return view('leavetypes.index')
						->with(['roles'=>$roles, 'leavetypes'=>$leavetypes]);
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
		$roles = Role::where('name', '!=', 'researcher')->get();
        return view('leavetypes.create')->with(['roles'=> $roles]);
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
			'leavetype_name'	 => 'required|regex:/^[\pL\s\- ;0-9_]+$/u|max:120',
			'leave_limit_peryear'=> 'required|numeric|max:10',
			'leave_conditions'   => 'required|regex:/^[\pL\s\- ;,._ 0-9]+$/u|max:250',
			'needs_permission'   => 'min:0|max:1',
			'exclude_holidays'   => 'min:0|max:1',
			'allow_halfday'      => 'min:0|max:1',
			'eligible_gender_id' => 'required|numeric|max:3',
			'role_ids' 			 =>	'required|array',
			'carriable'			 => 'required|numeric|max:3',
			'carried_on_limit'	 => 'required_unless:carriable,1|numeric|max:3',
			'cumulative_ceiling' => 'required_unless:carriable,1|numeric|max:15',
        ]);
		
		//Retrieving only the relevant field data
		$input = $request->only(	
			'leavetype_name',
			'leave_limit_peryear',
			'leave_conditions',
			'needs_permission',
			'exclude_holidays',
			'allow_halfday',
			'eligible_gender_id',
			'role_ids',
			'carriable',
			'carried_on_limit',
			'cumulative_ceiling',
		);
				
		$erid = $request->only('role_ids');
				
		$tx = $erid['role_ids'];

		$input['posted_by'] = Auth::user()->name;
		
		//dd($input, $tx);
		
		foreach($tx as $val)
		{
			$input['eligible_role_id'] = $val;
			$resp = Leavetype::create($input); 
		}	
    
		//Redirect to the leavetypes.index view and display message
        return redirect()->route('leavetypes.index')
            ->with('flash_message',
             'Leavetype successfully added.');
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
		$roles = Role::all();				
		$leavetypes = Leavetype::findOrFail($id); //Get user with specified id
		//dd($leavetypes);
		//pass user and roles data to view
        return view('leavetypes.edit', compact('leavetypes', 'roles')); 
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
		$leavetype = Leavetype::findOrFail($id); 
				dd($leavetype);
		//Validate name, email and password fields
        $this->validate($request, [
			'eligible_gender_id' => 'required|numeric|max:30',
			'eligible_role_id' => 'required|numeric|max:30',
			'leavetype_name'=>'required|regex:/^[\pL\s\-]+$/u|max:120',
			'leave_conditions'=>'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:250',
			'leave_limit_peryear'=>'required|numeric|max:30',
			'carriable'=>'required|numeric|max:3',
			'carried_on_limit'=>'required|numeric|max:30',
			'cumulative_ceiling'=>'required|numeric|max:300',
        ]);
		
		//Retrieving only the relevant field data
		$input = $request->only(	
			'eligible_gender_id',
			'eligible_role_id',
			'leavetype_name', 
			'leave_conditions', 
			'leave_limit_peryear',
			'carriable',
			'carried_on_limit',
			'cumulative_ceiling'
		);
																	
		$input['posted_by'] = Auth::user()->name;
		
		$leavetype->fill($input)->save();
    
		//Redirect to the leavetypes.index view and display message
        return redirect()->route('leavetypes.index')
            ->with('flash_message',
             'Leavetype successfully Edited.');
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
		$leavetype = Leavetype::findOrFail($id); 
		$leavetype->delete();

		return redirect()->route('leavetypes.index')
		  ->with('flash_message',
				'Leave types successfully deleted.');
    }
}
