<?php

namespace App\Http\Controllers;

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
use App\Models\Project;
use App\Models\Projfiles;
use App\Models\Projectgoals;
use App\Models\User;

//Traits
use App\Traits\Baseinfo;
use App\Traits\Duedate;

use App\Http\Requests\ProjectformRequest;
use App\Http\Requests\ProjeditRequest;

//Uuid import class
use Webpatser\Uuid\Uuid;

class ProjectsController extends Controller
{
    use Baseinfo, Duedate;
    
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
      if( Auth::user()->hasExactRoles(['employee']) )
      {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
      }
      
      if( Auth::user()->hasExactRoles(['supervisor', 'employee']) )
      {      
        $projects = Project::all();
        return view('projects.index', compact('projects'));             
      }
      
      if( Auth::user()->hasExactRoles(['admin', 'employee']) )
      {      
        $projects = Project::all();
        return view('projects.index', compact('projects'));
      }
      
      if( Auth::user()->hasExactRoles(['director', 'employee']) )
      {      
        $projects = Project::all();
        return view('projects.index', compact('projects'));       
      }
      
      if( Auth::user()->hasExactRoles(['sysadmin', 'employee']) )
      {      
        
        
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('name','<>', 'smofficeadmin@gmail.com')->get();
        //$project = Project::with('proj_lead')->where('uuid', $id)->first();
        return view('projects.create', compact('users'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectformRequest $request)
    {
      //first complete file upload
      
      //begin project entry
      $input = $request->validated();

      //get inputs
      $input = $request->only(
            'title', 
            'description', 
            'status', 
            'agency',
            'proj_lead',
            'total_budget',
            'comments',
            'start_date',
            'end_date',
            'est_time_weeks');
            
      $input['employee_id'] = Auth::user()->id;
      $input['office_reference'] = "Abcd/23/11Jan2024";
      //$input['spent_budget'] = 0.00;
      $input['date_submitted'] = date('Y-m-d');   
      $input['uuid'] = Uuid::generate()->string;
      $input['progress'] = 0;
      $input['progress_date'] = date('Y-m-d');
      $result = Project::create($input);
      
      //no get inputs of project goals
      $inp = $request->all();
      
      //now put goals in projectgoals table
      //dd($inp);
      $inp['folder'] = $this->generateCode(12);
      
      $farray = [];
      
      for($i=0; $i < 5; $i++)
      {
        $farray['project_id'] = $result->project_id;
        $farray['goal']       = $inp['goals'][$i];
        $farray['desc']       = $inp['goal_desc'][$i];
        $farray['budget']     = $inp['goal_budget'][$i];
        $farray['est_time']   = $inp['goal_estime'][$i];
        $farray['ref_files']  = null;
        $farray['misc_info']  = null;
        $farray['comments']   = null;
        $farray['status']     = 1;
        $farray['folder']     = $inp['folder'];
        $farray['uuid']       = $input['uuid'];
        
        $resF[] = Projectgoals::create($farray);
        
        unset($farray);
      }
      
      //everything complete and return to home page
      return redirect()->route('projects.index')
            ->with('flash_message',
             'New Project '. $input['title'].' created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $project = Project::with('proj_owner')
                        ->with('proj_lead')
                        ->with('smart_goals')
                        ->where('uuid', $id)
                        ->first();
                        
      $projGoalsAssigned = Projectgoals::where('goalowner_id', Auth::id())->get();
      
      return view('projects.show', compact('project', 'projGoalsAssigned'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $project = Project::with('proj_lead')->with('smart_goals')->where('uuid', $id)->first();
      $users = User::where('name','<>', 'smofficeadmin@gmail.com')->get();
      $files = Projfiles::where('uuid', $id)->get();
      //dd($files);
      return view('projects.edit', compact('project', 'users')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjeditRequest $request, $id)
    {
       //begin project entry
      $input = $request->validated();

      //get inputs
      $input = $request->only(
        'description', 
        'project_leader',
        'status', 
        'agency',
        'total_budget',
        'spent_budget',
        'comments',
        'start_date',
        'end_date',
        'est_proj_time'
      );
            
      $input['employee_id'] = Auth::user()->id;
      
      $input['date_submitted'] = date('Y-m-d');   
    
      $result = Project::where('uuid', $id)->update($input);
      
      //now get inputs of project goals
      $inp = $request->all();
      //dd($input,$inp);
      //now put goals in projectgoals table
    
      $farray = [];
      
      //for($i=1; $i < 6; $i++)
      foreach($inp['goals'] as $key => $val)
      {
        $farray['goal']       = $inp['goals'][$key];
        $farray['desc']       = $inp['goal_desc'][$key];
        $farray['budget']     = $inp['goal_budget'][$key];
        $farray['est_time']   = $inp['goal_estime'][$key];
        $farray['comments']   = $inp['gcomments'][$key];
        // $farray['ref_files']  = null;
        // $farray['misc_info']  = null;
        // $farray['comments']   = $inp['inputComments'];
        $farray['status']     = $input['status'];
                
        $resF[] = Projectgoals::where('projectgoal_id', $key)->update($farray);
        
        unset($farray);
      }
      
      //everything complete and return to home page
      return redirect()->route('projects.index')
            ->with('flash_message',
             'Project updated!');
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
