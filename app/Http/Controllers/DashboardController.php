<?php

namespace App\Http\Controllers;

//framework
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//models
use App\Models\Communication;
use App\Models\Event;
use App\Models\Group;
use App\Models\Itax;
use App\Models\Kanbancards;
use App\Models\Leave;
use App\Models\Leaverecord;
use App\Models\Project;
use App\Models\Notice;
use App\Models\Tour;
use App\Models\User;

//Traits
use App\Traits\Duedate;
use App\Traits\Eventhandler;	
  
use Illuminate\Support\Facades\Route;


class DashboardController extends Controller
{
	use Duedate;
  use Eventhandler;
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$user = Auth::user();
		
		$role_name = Auth::user()->roles->pluck('name')[0];
    
    //$role_name = Auth::user()->roles->pluck('name');
    
    //dd($role_name);
		
		if($role_name == "" || $role_name == null)
		{
			$role_name = "Role Not Assigned";
		}
		
		if( Auth::user()->hasExactRoles(['employee']) )
		{
			$notices = Notice::orderBy('notice_id', 'desc')->limit(10)->get();
			
			$leaverecord = Leaverecord::where('employee_id', $user->id)->get();
			
			$leaves = Leave::where('employee_id', $user->id)->orderBy('leave_id', 'desc')->get();
			
			$tours = Tour::where('employee_id', $user->id)->orderBy('tour_id', 'desc')->get();
						
			$repdue = [];
      
			$events = $this->calendarEvents(); 								
												
			$communications = Communication::where('employee_id', Auth::id())
								->where('status', '!=', 5)
								->where('status', '!=', 5)
								->orderBy('communication_id', 'desc')
								->get();
																				
			$messages = array();			
		
      $kbCards = Kanbancards::where('posted_by', Auth::user()->name)->get();
      
			return view('layouts.home.employee.dashboard', compact(
										'leaverecord','communications','leaves',
										'tours','events','messages',
										'notices','repdue', 'role_name','kbCards'));
		}

		if( Auth::user()->hasExactRoles(['supervisor', 'employee']) )
		{
			$employee_count = count(User::all());
			
			$project_count = count(Project::all());
			
			$notices = Notice::orderBy('notice_id', 'desc')->limit(10)->get();
			
			$communications = DB::table('groups')
								->leftJoin('communications', 'communications.employee_id', 'groups.member_id')
								->where('groups.groupleader_id', Auth::id())
								->where('status', '<=', 4)
								->get();
			
			$reports = DB::table('groups')
						->leftJoin('reports', 'reports.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('sup_decision', '<=', 4)
						->get();
														
			$leaves = DB::table('groups')
							->leftJoin('leaves', 'leaves.employee_id', 'groups.member_id')
							->where('groups.groupleader_id', Auth::id())
						//->where('sup_approval', '<=', 4)
							->get();
														
			$tours = DB::table('groups')
						->leftJoin('tours', 'tours.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('tour_status', '<=', 2)
						->get();	
														
			$events = DB::table('groups')
						->leftJoin('events', 'events.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('events.event_start', '>=', date('Y-m-d'))
						->get();
														
			$itEmp = Itax::with('user')
						->where('employee_id', Auth::id() )->get();

			return view('layouts.home.employee.dashboard', compact('employee_count','project_count', 'communications','notices',	'reports',
														'itEmp','leaves','tours','events','role_name'));
		}

		if( Auth::user()->hasExactRoles(['admin', 'team_leader', 'employee']) )
		{
			$employee_count = count(User::all());
			
			$project_count = count(Project::all());
			
			$notices = Notice::orderBy('notice_id', 'desc')->limit(10)->get();
			
			$communications = DB::table('groups')
								->leftJoin('communications', 'communications.employee_id', 'groups.member_id')
								->where('groups.groupleader_id', Auth::id())
								->where('status', '<=', 4)
								->get();

			$reports = DB::table('groups')
						->leftJoin('reports', 'reports.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('sup_decision', '<=', 4)
						->get();
														
			$leaves = DB::table('groups')
							->leftJoin('leaves', 'leaves.employee_id', 'groups.member_id')
							->where('groups.groupleader_id', Auth::id())
						//->where('sup_approval', '<=', 4)
							->get();
														
			$tours = DB::table('groups')
						->leftJoin('tours', 'tours.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('tour_status', '<=', 2)
						->get();	
														
			$events = DB::table('groups')
						->leftJoin('events', 'events.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('events.event_start', '>=', date('Y-m-d'))
						->get();
														
			$itEmp = Itax::with('user')
						->where('employee_id', Auth::id() )->get();
            
      $kbCards = Kanbancards::where('posted_by', Auth::user()->name)->get();

			return view('layouts.home.admin.dashboard', compact('employee_count','project_count', 'communications','notices',	'reports',
														'itEmp','leaves','tours','events','role_name', 'kbCards'));
		}

		if( Auth::user()->hasExactRoles(['director']) )
		{
			$employee_count = count(User::all());
		
			$project_count = count(Project::all());
			
			$notices = Notice::orderBy('notice_id', 'desc')->limit(10)->get();
			
			$communications = DB::table('groups')
								->leftJoin('communications', 'communications.employee_id', 'groups.member_id')
								->where('groups.groupleader_id', Auth::id())
								->where('status', '<=', 4)
								->get();
			
			$reports = DB::table('groups')
						->leftJoin('reports', 'reports.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('sup_decision', '<=', 4)
						->get();
														
			$leaves = DB::table('groups')
							->leftJoin('leaves', 'leaves.employee_id', 'groups.member_id')
							->where('groups.groupleader_id', Auth::id())
						//->where('sup_approval', '<=', 4)
							->get();
														
			$tours = DB::table('groups')
						->leftJoin('tours', 'tours.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('tour_status', '<=', 2)
						->get();	
														
			$events = DB::table('groups')
						->leftJoin('events', 'events.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('events.event_start', '>=', date('Y-m-d'))
						->get();
														
			$itEmp = Itax::with('user')
						->where('employee_id', Auth::id() )->get();

			return view('layouts.home.director.dashboard', compact('employee_count','project_count', 'communications','notices',	'reports',
														'itEmp','leaves','tours','events','role_name'));
		}

 		if( Auth::user()->hasExactRoles(['sysadmin']) )
		{
			$employee_count = count(User::all());
			
			$project_count = count(Project::all());
			
			$notices = Notice::orderBy('notice_id', 'desc')->limit(10)->get();
			
			$communications = DB::table('groups')
								->leftJoin('communications', 'communications.employee_id', 'groups.member_id')
								->where('groups.groupleader_id', Auth::id())
								->where('status', '<=', 4)
								->get();
			
			$reports = DB::table('groups')
						->leftJoin('reports', 'reports.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('sup_decision', '<=', 4)
						->get();
														
			$leaves = DB::table('groups')
							->leftJoin('leaves', 'leaves.employee_id', 'groups.member_id')
							->where('groups.groupleader_id', Auth::id())
						//->where('sup_approval', '<=', 4)
							->get();
														
			$tours = DB::table('groups')
						->leftJoin('tours', 'tours.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('tour_status', '<=', 2)
						->get();	
														
			$events = DB::table('groups')
						->leftJoin('events', 'events.employee_id', 'groups.member_id')
						->where('groups.groupleader_id', Auth::id())
						->where('events.event_start', '>=', date('Y-m-d'))
						->get();
														
			$itEmp = Itax::with('user')
						->where('employee_id', Auth::id() )->get();

			return view('dashboard', compact('employee_count','project_count', 'communications','notices',	'reports',
														'itEmp','leaves','tours','events','role_name'));
		}
    
		if( Auth::user()->hasRole('norole') )
		{
			return view('dashboard');
		}
			
			
		return view('layouts.home.norole.noRoleHome');
	}
  
}
