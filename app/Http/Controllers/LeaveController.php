<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Models
use App\Models\Group;
//use App\Models\Hop;
use App\Models\Leave;
use App\Models\Leaverecord;
use App\Models\Leavetype;

//Traits
use App\Traits\Baseinfo;
use App\Traits\Comments;
use App\Traits\Decision;
//use App\Traits\Fileupload;
//use App\Traits\Groupidentity;
use App\Traits\Leavehandler;

class LeaveController extends Controller
{
	use Baseinfo, Comments, Decision, Leavehandler;
	
	public function __construct()
  {
		$this->controller = "Leaves";
		$this->folder = "media/office/leaves";
		//$this->middleware(['auth', 'tenancy.enforce', 'acmiddle']); 
  }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
  {
    $leaverecords = Leaverecord::with('leavetype')->where('employee_id', Auth::id())->get();

    $ownLeaves = Leave::with('leavetype')->where('employee_id', Auth::id())
              //->where('leave_status', '<=', 1)
              ->orderBy('leave_id', 'asc')
              ->get();

    if( Auth::user()->hasExactRoles(['employee']) )
    {
      $ownLeaves = Leave::with('leavetype')->where('employee_id', Auth::id())
                //->where('leave_status', '<=', 1)
                ->orderBy('leave_id', 'asc')
                ->get();
      $groupLeaves = array();	
    }
    
    if( Auth::user()->hasExactRoles(['supervisor', 'employee']) )
    {
      $groupLeaves = DB::table('leaves')
              ->leftJoin('hops', 'hops.uuid', 'leaves.uuid')
              ->leftJoin('users', 'users.id', 'leaves.employee_id')
              ->where('hops.next_id', Auth::id())	
              ->get();
    }
    
    if( Auth::user()->hasExactRoles(['admin', 'employee']) )
    {
      $groupLeaves = DB::table('leaves')
              ->leftJoin('hops', 'hops.uuid', 'leaves.uuid')
              ->leftJoin('users', 'users.id', 'leaves.employee_id')
              ->where('hops.next_id', Auth::id())	
              ->where('leaves.leave_status', '>=', 2)
              ->get();
    }
  
    if( Auth::user()->hasExactRoles(['director', 'employee']) )
    {
      $groupLeaves = DB::table('leaves')
              ->leftJoin('hops', 'hops.uuid', 'leaves.uuid')
              ->leftJoin('users', 'users.id', 'leaves.employee_id')
              ->where('hops.next_id', Auth::id())	
              ->where('leaves.leave_status', '>=', 2)
              ->get();
      
    }
      
    return view('leaves.index')
          ->with(['ownLeaves'=> $ownLeaves,
              'groupLeaves'=> $groupLeaves,
              'leaverecords'=>$leaverecords ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $user = Auth::user();
        
    $roles = $user->roles;
    
    foreach($roles as $val) 
    {
      $role_id = $val->id;
    }
      
    //include gender match check also
    $leavetypes = Leavetype::where('eligible_role_id', $role_id)
              ->select('leavetype_name','leavetype_id','leave_conditions')->get();
                  
    return view('leaves.create')->with(['leavetypes'=> $leavetypes]);
  }
	
	public function casual()
  {
    $role_id = Auth::user()->roles->first()->id;	
    
    //include gender match check also
    $leavetypes = Leavetype::where('eligible_role_id', $role_id)
            ->select('leavetype_name','leavetype_id','leave_conditions')->get();
          
    if(count($leavetypes) > 0 )
    {
      return view('leaves.casual')
        ->with(['leavetypes'=> $leavetypes]);
    }
    else {
      $message =  "Allowed Leave Types Not Found";
      return redirect()->back()->withErrors(['error'=>$message]);
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
    if( Auth::user()->hasRole(['researcher', 'employee','admin']) )
    {
      //Validate name, email and password fields
      $this->validate($request, [
        'leavetype_id' => 'required|numeric|max:12',
        'leave_start'  => 'required|date_format:Y-m-d',
        'leave_end'    => 'required|date_format:Y-m-d',
        'leave_reason' => 'required|regex:/^[\pL\s\- .,;0-9_]+$/u|max:250'
      ]);
    
      //Retrieving only the email and password data
      $input = $request->only(
          'leavetype_id', 
          'leave_start', 
          'leave_end', 
          'leave_reason');
                              
      if($request->has('start_noon') && $request->has('end_noon') )
      {
        $this->validate($request, [
          'start_noon' => 'required|alpha',
          'end_noon' => 'required|alpha',
        ]);
        
        $tx = $request->only('start_noon','end_noon');
        $input['leave_start_session'] = $tx['start_noon'];
        $input['leave_end_session'] = $tx['end_noon'];
      }
      else {
        $input['leave_start_session'] = 'forenoon';
        $input['leave_end_session'] = 'afternoon';
      }
      
      $input['employee_id'] = Auth::id();
      $input['comments'] = 'Submitted';
      $input['comments'] = $this->addTimeStamp($input['comments']);
      $input['notes'] = 'None';
      $input['notes'] = $this->addTimeStamp($input['notes']);
      $input['controller'] = $this->controller;
      $input['purpose'] = "new";
      //dd($input);
      
      $result = $this->processLeave($input);

      if($result)
      {
        //Redirect to the users.index view and display message
        return redirect()->route('leaves.index')
                ->with('flash_message',
                'Leave Successfully Submitted.');
      }
      else {
        $message =  "Leave Not posted. Errors detected";
        return redirect()->back()->withErrors(['errors'=>$message]);
      }
    }
  }

  public function form($id)
  {
    //include gender match check also
    
    $leavetypes = Leavetype::where('leavetype_id', $id)
              ->select('leavetype_name','leavetype_id','leave_conditions')->get();
              
    //dd($leavetypes);
    
    return view('leaves.create')
          ->with(['leavetypes'=> $leavetypes]);
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
    $leave = Leave::with('leavetype')->with('user')->where('uuid', $id)->first();
    $roles = Role::all();
    return view('leaves.edit2')
            ->with(['leave'=> $leave,
                    'roles'=>$roles ]);
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
    $leaveObject = Leave::where('uuid', $id)->first();
    
    $oldComments = $leaveObject->comments;
    

    
    if( Auth::user()->hasRole(['employee']) )
    {
      //Validate name, email and password fields
      $this->validate($request, [
       // 'leavetype_id'=>'required|numeric|max:12',
        'leave_start'=>'required|date_format:Y-m-d',
        'leave_end'=>'required|date_format:Y-m-d',
        'leave_reason'=>'required|regex:/^[\pL\s\- .,;0-9_]+$/u|max:250'
      ]);
      
      //Retrieving only the email and password data
      $input = $request->only('leavetype_id', 
                'leave_start', 
                'leave_end', 
                'leave_reason');
                
      if($request->has('start') && $request->has('end') )
      {
        $this->validate($request, [
          'start' => 'required|alpha',
          'end' => 'required|alpha',
        ]);
        $sx = $request->only('start');
        $ex = $request->only('start');
        
        $input['leave_start_session'] = $sx['start'];
        $input['leave_end_session'] = $ex['start'];
      }
      else {
        $input['leave_start_session'] = "forenoon";
        $input['leave_end_session'] = "afternoon";
      }

      $input['employee_id'] = Auth::id();
      $input['comments'] = 'Edited';
      $input['comments'] = $this->addComment($oldComments, $input['comments']);
      $input['uuid'] = $id;
      $input['notes'] = 'Edited';  
      $input['purpose'] = "edit";
      $input['controller'] = $this->controller;
    
      //dd($input);
      $result = $this->processLeave($input);
      
      if($result)
      {
        //Redirect to the users.index view and display message
        return redirect()->route('leaves.index')
                      ->with('flash_message',
                          'Leave Decision Updated.');
      }
      else {
        $message =  "Leave Decision Not Posted. Errors detected";
        return redirect()->back()->withErrors(['errors'=>$message]);
      }
    }
  }

	public function decision(Request $request, $id)
	{
		if( Auth::user()->hasAnyPermission(['leave_decision', 'leave_approval']))
		{
			$userGroup = $this->usersByRoles();
			$leavedetails = Leave::with('leavetype')->with('user')->where('uuid', $id)->get();
			$pathBreadCrumb = $this->pathBreadCrumb($id);
			$bcrumb = $this->breadCrumbArray($id);
			return view('leaves.decisionSupAdmDir', 
						compact('leavedetails', 'pathBreadCrumb','bcrumb', 'userGroup'));
		}
		else {
			$message =  "Required Permission Not Found";
			return redirect()->back()->withErrors(['errors'=>$message]);
		}
	}

	public function postDecision(Request $request, $id)
	{
		if( Auth::user()->hasAnyPermission(['leave_decision', 'leave_approval']))
		{
			$uuid = $id;
			$leave = Leave::where('uuid', $uuid)->first();
			$this->validate($request, [
				'decision'  => 'required|numeric|max:10',
				'comments' =>  'nullable|regex:/^[\pL\s\-_.:, 0-9]+$/u|max:250',
			]);
			if($request->has('notes'))
			{
				$this->validate($request, [
					'notes' => 'sometimes',
				]);
			}
			$result = $this->dri->updateDecision($request, $leave);
			//update leave record now
			if($result)
			{
				$result = $this->lri->updateLeaverecordDB($leave->leave_id);
			}
			//Redirect to the users.index view and display message
			return redirect()->route('leaves.index')
											->with('flash_message',
											'Leave Decision Updated.');											
		}
		else {
			$message =  "Required Permission Not Found";
			return redirect()->back()->withErrors(['errors'=>$message]);
		}
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
