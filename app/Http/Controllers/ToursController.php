<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Repositories\BaseRepositoryInterface;
use App\Repositories\ToursRepositoryInterface;
use App\Repositories\DecisionRepositoryInterface;

use App\Http\Requests\ToursRequest;

use App\Models\Tour;
use App\Models\Researcher;
use App\Models\Employee;
use App\Models\Group;

use App\Traits\Comments;
use App\Traits\Baseinfo;
use App\Traits\Queries;
use App\Traits\Trail;
use App\Traits\Fileupload;
use App\Traits\Nexthop;
use App\Traits\Tourhandler;

class ToursController extends Controller
{
  use Baseinfo, Comments, Fileupload, Queries, Nexthop, Trail, Tourhandler;

  private $controller;

  private $folder;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct() 
  {
    $this->controller = "Tours";
    $this->folder = "media/office/tours";       
    //$this->middleware(['auth']);
  }
  
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    
    $tourSelf = Tour::where('employee_id', Auth::id())->get();
    
    $tourGroup = array();
    
    if( Auth::user()->hasExactRoles(['employee']) )
    {	
        
    }
    
    if( Auth::user()->hasExactRoles(['supervisor','employees']) )
    {	
      $tourGroup = DB::table('tours')
                    ->leftJoin('hops', 'hops.uuid', 'tours.uuid')
                    ->leftJoin('users', 'users.id', 'tours.employee_id')
                    ->where('hops.next_id', Auth::id())	
                    ->where('tours.tour_status', '<=', 5)
                    ->get();
    }
    
    if( Auth::user()->hasExactRoles('admin','employees') )
    {	
      $tourGroup = DB::table('tours')
                    ->leftJoin('hops', 'hops.uuid', 'tours.uuid')
                    ->leftJoin('users', 'users.id', 'tours.employee_id')
                    ->where('hops.next_id', Auth::id())	
                    ->where('tours.tour_status', '<=', 5)
                    ->get();
    }
    
    if( Auth::user()->hasExactRoles('director','employees') )
    {	
      $tourGroup = DB::table('tours')
                    ->leftJoin('hops', 'hops.uuid', 'tours.uuid')
                    ->leftJoin('users', 'users.id', 'tours.employee_id')
                    ->where('hops.next_id', Auth::id())	
                    ->where('tours.tour_status', '>=', 2)
                    ->get();
    }
    
    return view('tours.index')
                ->with(['tourSelf'=>$tourSelf, 'tourGroup'=>$tourGroup]);
                
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    
    return view('tours.create');
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ToursRequest $request)
  {
    if( Auth::user()->hasAnyPermission(['tour_apply', 'tour_edit']) )
    {	
      //$validation = $this->validateRequest($request);
      $input = $this->inputRequest($request);	
			
      $input['controller'] = $this->controller;	
      
      $tour = $this->processTourProposal($input);	
      
      return redirect()->route('tours.index')
                      ->with('flash_message',
                      'New Tour Entry Posted successfully.');
                      
    }
    else {
    	$message = "Required Permission Not Found";
    	return redirect()->back()->withErrors(['errors'=>$message]);
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
    //dd($id);
    if( Auth::user()->hasAnyPermission(['tour_update', 'tour_edit']))
    {
      //dd($id);
      $tourdetails = Tour::where('uuid', $id)->first(); 
      return view('tours.editResearcher', compact('tourdetails')); 
    }
    else {
      $message =  "Required Permission Not Found";
      return redirect()->back()->withErrors(['errors'=>$message]);
    }	

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
    $tour = Tour::where('uuid', $uuid)->first(); 
 
    if( Auth::user()->hasAnyPermission(['tour_update', 'tour_edit']))
    {
      $this->validateRequest($request);
  
      $input = $this->inputRequest($request);
      
      $input['tour_id'] = $id;		
      $input['employee_id'] = Auth::id();
      $input['date_submitted'] = date('Y-m-d');
      $input['comments'] = $this->addComment($tour->comments, "Edited");
              
      $tour = $this->tri->editTourProposal($input);
    
      return redirect()->route('tours.index')
                      ->with('flash_message',
                      'New Entry Edited successfully.');
    }
      else {
      $message = "Required Permission Not Found";
      return redirect()->back()->withErrors(['errors'=>$message]);
    }
  }

  public function decision(Request $request, $id)
  {
    if( Auth::user()->hasAnyPermission(['tour_decision', 'tour_approval']))
    {
      $userGroup = $this->usersByRoles();
    
      $pathBreadCrumb = $this->pathBreadCrumb($id);
    
      $bcrumb = $this->breadCrumbArray($id);
    
      $tourdetails = Tour::where('uuid',$id)->get();
    
      return view('tours.editSupervisor', 
                  compact('tourdetails', 'pathBreadCrumb','bcrumb', 'userGroup'));
    }
    else {
      $message =  "Required Permission Not Found";
      return redirect()->back()->withErrors(['errors'=>$message]);
    }				
  }
    
  public function postDecision(Request $request, $uuid)
  {	
    if( Auth::user()->hasAnyPermission(['tour_decision', 'tour_approval']))
    {
      $tour = Tour::where('uuid', $uuid)->first();
      
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
      
      $result = $this->dri->updateDecision($request, $tour);
    
      return redirect()->route('tours.index')
          ->with('flash_message',
           'Tour Decision Updated');
    }
    else {
      $message =  "Required Permission Not Found";
      return redirect()->back()->withErrors(['errors'=>$message]);
    }						 
  }
    
  /*
  private function validateRequest($request)
  {
    $this->validate($request, [
      'budget_head'  => 'required|regex:/^[\pL\s\- \/\., _ 0-9]+$/u|max:50',
      'tour_purpose' => 'required|regex:/^[\pL\s\- \/\., _ 0-9]+$/u|max:50',
      'journey_mode' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
      'journey_class' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
      'tada_advance'  => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
      
      'dep_station' => 'required|regex:/^[\pL\s\-  _ 0-9]+$/u|max:50',
      'dep_station_date' => 'required|date_format:Y-m-d',
      'dep_station_time' => 'required|date_format:H:i',
      
      'destination' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
      'dest_arr_date' => 'required|date_format:Y-m-d',
      'dest_arr_time' => 'required|date_format:H:i',
      
      'rj_station' => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
      'rj_station_date' => 'required|date_format:Y-m-d',
      'rj_station_time' => 'required|date_format:H:i',
      
      'rj_origin'  => 'required|regex:/^[\pL\s\- ; _ 0-9]+$/u|max:50',
      'rj_origin_arr_date' => 'required|date_format:Y-m-d',
      'rj_origin_arr_time' => 'required|date_format:H:i',
    ]);
  }
  */
    
  private function inputRequest($request)
  {
    $input = $request->only
    (
      'budget_head',
      'tour_purpose',
      'journey_mode',
      'journey_class',
      'tada_advance',
      
      'dep_station',
      'dep_station_date',
      'dep_station_time',
      
      'destination',
      'dest_arr_date',
      'dest_arr_time',
      
      'rj_station',
      'rj_station_date',
      'rj_station_time',
      
      'rj_origin',
      'rj_origin_arr_date',
      'rj_origin_arr_time'
    );	
    return $input;
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
