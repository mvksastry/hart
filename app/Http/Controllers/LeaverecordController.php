<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importing laravel-permission models
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Repositories\LeaveRepositoryInterface;

//Models
use App\Models\User;
use App\Models\Leaverecord;
use App\Models\Leavetype;
//use App\Models\Researcher;
use Auth;


class LeaverecordController extends Controller
{
	//isAdmin middleware lets only users with a 
	//specific permission permission to access these resources
	public function __construct() 
	{
        //$this->middleware(['auth']);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		if( Auth::user()->hasRole('director') )
		{
			$leaverecords = Leaverecord::with('user')              
									->whereExists(function($query)
									{
										$query->select(DB::raw("*"))
											->from('employees')
											->whereRaw('leaverecords.employee_id = employees.employee_id');
									})
									->get();
		}	
			
		if( Auth::user()->hasRole('admin') )
		{
			$leaverecords = Leaverecord::with('user')              
									->whereNotExists(function($query)
									{
										$query->select(DB::raw("*"))
											->from('employees')
											->whereRaw('leaverecords.employee_id = employees.employee_id');
									})
									->get();
		}			
		
		//Get all users and pass it to the view 
		//$leaverecords = Leaverecord::with('employee')->get();
        return view('leaverecords.index')
				->with(['leaverecords'=>$leaverecords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		if( Auth::user()->hasRole('dean') )
		{
			$role_id = Role::where('name', 'researcher')->pluck('id')->first();				
			//$users = User::role(['user', 'admin', 'dean','supervisor'])->get();
			$users = User::role('researcher')->get();
			
			$leavetypes = Leavetype::where('eligible_role_id', $role_id)->get();
			return view('leaverecords.create')
						->with(['users'=>$users, 'leavetypes'=>$leavetypes]);	
		}
		if( Auth::user()->hasRole('admin') )
		{
			$role_id = Role::where('name', 'researcher')->pluck('id')->first();
			$role_names = Role::where('name', '!=', 'researcher')->pluck('name');
			
			//$users = User::role(['user', 'admin', 'dean','supervisor'])->get();
			$users = User::role($role_names)->get();
			
			$leavetypes = Leavetype::where('eligible_role_id', '!=', $role_id)->get();
			return view('leaverecords.create')
						->with(['users'=>$users, 'leavetypes'=>$leavetypes]);	
		}
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function massPostForm()
    {
        //
		$users = User::role('researcher')->get();
		
		$leavetypes = Leavetype::all();
		return view('leaverecords.masspostform');
										
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//Validate name, email and password fields
        $this->validate($request, [
            'employee_id'=>'required|numeric|max:120',
            'eligible_leavetype_id'=>'required|numeric|max:12',
            'current_year_credit'=>'required|numeric|max:45'
        ]);
		
		//Retrieving only the email and password data
		$input = $request->only('employee_id', 'eligible_leavetype_id', 'current_year_credit');

		$result = $this->lri->processUserLeaveCredit($input);
        
		if($result)
		{
			//Redirect to the users.index view and display message
			return redirect()->route('leaverecords.index')
			->with('flash_message',
			'User Leave successfully credited.');
		}
		else {
			//Redirect to the users.index view and display message
			return redirect()->route('leaverecords.index')
			->with('flash_message',
			'User Leave not credited.');
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
		//Get all users and pass it to the view 
		$leaverecords = Leaverecord::with('user')
												->where('leaverecord_id', $id)->first();
												
		if( Auth::user()->hasRole('dean') )
		{
			$role_id = Role::where('name', 'researcher')->pluck('id')->first();
			$leavetypes = Leavetype::where('eligible_role_id', $role_id)->get();
		}
		
		if( Auth::user()->hasRole('admin') )
		{
			$role_id = Role::where('name', 'employee')->pluck('id')->first();
			$leavetypes = Leavetype::where('eligible_role_id', $role_id)->get();
		}
        return view('leaverecords.edit')
							->with(['leavetypes'=>$leavetypes, 'leaverecords'=>$leaverecords]);
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

	public function massUpdateNewLeaves(Request $request)
	{
		
		$result = $this->lri->processMassPostNewLeaves();
		
		if($result)
		{
			//Redirect to the users.index view and display message
			return redirect()->route('leaverecords.index')
			->with('flash_message',
			 'User Leave successfully credited.');
		}
		else {
			//Redirect to the users.index view and display message
			return redirect()->route('leaverecords.index')
			->with('flash_message',
			'User Leave not credited.');
		}
		
	}


	/*
	Steps:
	1. Get all users
	2. Check whether any leaves already credited in the current FY
	3. If yes, abort the addition, return with message
	4. If no, go ahead and add. CLs do not get carried forward
	*/	
	public function creditCLs()
	{
		// show mass post CL form
		return view('leaverecords.massPostCLForm');		
	}
	
	public function addNewCLs()
	{ 
		$input = [];
		$current_year = date('Y');
		
		//get all roles name and role_id
		$roles = Role::pluck('name', 'id');
		
		//loop through the roles, retrive the user credentials
		foreach($roles as $key => $role_name)
		{
			$role_id = $key;
			$leavetype = Leavetype::where('eligible_role_id', $role_id)->first();
			
			if (!is_null($leavetype)) 
			{
				$leavetype_id = $leavetype->leavetype_id;
				$leavetype_name = $leavetype->leavetype_leavetype_name;
				$leave_limit_peryear = $leavetype->leave_limit_peryear;
				
				$employees = User::role($role_name)->get();
				//foreach employee cycle through and add Leaves
				foreach($employees as $row)
				{
					//check if a record exists, if yes delete it for the year.
					// have same current year, employee id.
					$matchThese = ['current_year' => $current_year, 'employee_id' => $row->id];
					$delResult = Leaverecord::where($matchThese)->delete();
					
					// now pull through all eligible leavetypes 
					//and cycle through and add to them		
					$input['employee_id'] = $row->id;               
					$input['eligible_leavetype_id'] = $leavetype_id;     
					$input['current_year'] = $current_year;              
					$input['current_year_credit_status'] = 1;
					$input['current_year_credit'] =  $leave_limit_peryear;      
					$input['current_year_consumed'] = 0;
					$input['current_year_balance'] = $input['current_year_credit'] - $input['current_year_consumed'];
					$input['cumulative_balance'] = $input['current_year_balance'];   
					$input['balance_updated_at'] = date('Y-m-d H:i:s');   

					//dd($input);
					try {
						DB::beginTransaction();
						$result = Leaverecord::firstOrCreate($input);
						DB::commit();
					} catch (\Exception $e) {
						DB::rollback();
						throw $e;
						// something went wrong
					} catch (\Throwable $e) {
						DB::rollback();
						throw $e;
					}
					
					$input = [];
				}
			}
		}
		//Redirect to the leaverecords.index view and display message
		return redirect()->route('leaverecords.index')
						->with('flash_message',
						'User Leave successfully credited.');
	}

	public function creditPaidLeaves()
	{
		// show mass post CL form
		return view('leaverecords.massPostPLForm');		
	}
	
	public function addNewPaidLeaves()
	{
		dd("reached add new Paid Leaves");
		
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
