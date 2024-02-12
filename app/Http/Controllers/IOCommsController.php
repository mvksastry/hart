<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importing laravel-permission models
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Repositories\BaseRepositoryInterface;
use App\Repositories\DecisionRepositoryInterface;

//models
use Auth;
use App\Models\Communication;
use App\Models\Group;
use App\Models\Hop;
use App\Models\Note;
use App\Models\Path;
use App\Models\User;

//Traits
use App\Traits\Baseinfo;
use App\Traits\Comments;
use App\Traits\Decision;
use App\Traits\Fileupload;
use App\Traits\Nexthop;
use App\Traits\Groupidentity;
use App\Traits\Trail;
use App\Traits\Queries;

//File uploads
use File;

//Requests
use App\Http\Requests\IOCRequest;
use App\Http\Requests\IOCEditRequest;

//Uuid import class
use Webpatser\Uuid\Uuid;

//

class IOCommsController extends Controller
{

	use Baseinfo, Comments, Fileupload, Queries, Nexthop, Groupidentity, Trail;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    
	private $controller;
		
	private $folder;

	//isAdmin middleware lets only users with a 
	//specific permission permission to access these resources
	public function __construct() 
	{
		//$this->middleware(['auth']); 
  }
	
  public function index()
  {
		//			
		if( Auth::user()->hasExactRoles(['employee']) )
		{	
			$comSelf = Communication::with('user')
									->where('employee_id', Auth::id() )->get();
			$comGroup = array();
			return view('communications.index')
				->with(['comSelf'=>$comSelf, 'comGroup'=>$comGroup]);
		}
		
		if( Auth::user()->hasExactRoles(['finance','employee']) )
		{	
			$comSelf = Communication::with('user')
									->where('employee_id', Auth::id() )->get();
									
			$comGroup = DB::table('communications')
							->leftJoin('hops', 'hops.uuid', 'communications.uuid')
							->leftJoin('users', 'users.id', 'communications.employee_id')
							->where('hops.next_id', Auth::id())
							->get();
			return view('communications.index')
				->with(['comSelf'=>$comSelf, 'comGroup'=>$comGroup]);
		}
		
		if( Auth::user()->hasExactRoles(['admin','employee']) )
		{	
			$comSelf = Communication::with('user')
									->where('employee_id', Auth::id() )->get();
			$comGroup = DB::table('communications')
							->leftJoin('hops', 'hops.uuid', 'communications.uuid')
							->leftJoin('users', 'users.id', 'communications.employee_id')
							->where('hops.next_id', Auth::id())	
							->where('communications.status', '>=', 2)
							->get();
			//dd($comSelf, $comGroup);
			return view('communications.index')
				->with(['comSelf'=>$comSelf, 'comGroup'=>$comGroup]);
		}
		
		if( Auth::user()->hasExactRoles(['director','employee']) )
		{	
			$comSelf = Communication::with('user')
									->where('employee_id', Auth::id() )->get();
			$comGroup = DB::table('communications')
							->leftJoin('hops', 'hops.uuid', 'communications.uuid')
							->leftJoin('users', 'users.id', 'communications.employee_id')
							->where('hops.next_id', Auth::id())	
							->where('communications.status', '>=', 2)
							->get();
			return view('communications.index')
				->with(['comSelf'=>$comSelf, 'comGroup'=>$comGroup]);				
		}
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
		//first check whether there was an 
		//attempt to post and aborted on the way
		if( Auth::user()->hasAnyRole(['admin','finance','employee']) )
		{
			//$pathNames = Path::select('controller')->get();
			$pathNames = Path::orWhere('controller', 'like', '%'.'IOC_'. '%')->get();

			$communication = Communication::where('employee_id', Auth::id())
											->where('uuid', '!=', null)
											->where('filename', '!=', null)
											->where('date_submitted', '!=', null)
											->where('subject', null)
											->where('description', null)
											->first();	
			if(!empty($communication))
			{
				if($communication->filename != null )
				{
					$filename= $communication->filename; 
					$uuid = $communication->uuid; 
					
					return view('communications.newEdit', 
							compact('communication','filename','uuid','pathNames')); 
				}
			}
			else {
				return view('communications.create', compact('pathNames'));
			}
		}
		else {
			$message =  "Required Permission Not Found";
			return redirect()->back()->withErrors(['errors'=>$message]);
		}		
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(IOCRequest $request)
  {
    //
		if( Auth::user()->hasAnyRole(['employee']) )
		{
			//Retrieving only the description
			$input = $request->validated();
			
			$ioc = new Communication();
			
			$input['purpose'] = "new";
			
			$input['old_file'] = "none";	
			
			$input['uuid'] = Uuid::generate()->string;
			
			$ioc->uuid = $input['uuid'];
			$ioc->subject = $this->subjectPath($input['subject']);
			$ioc->description = $input['description'];
			
			if($request->hasFile('fileToUpload'))
			{				
				$input['old_file'] = "none";
				$ioc->filename = $this->uploadIOCFile($request, $input);
				$ioc->folder = $this->folder;
				$ioc->year = $this->finYear();
			}
			else {
				$input['filename'] = "none";
			}
		
			$doSave = $this->toDb($ioc, $input);
		
			// now make entry in hops table
			$resp = $this->makeNewHopEntry($ioc->subject, $input['uuid']);
			
			//Redirect to the users.index view and display message
			return redirect()->route('iocomms.index')
								->with('flash_message',
								'Communication successfully posted.');
		}
		else {
			$message =  "Required Permission Not Found";
			return redirect()->back()->withErrors(['errors'=>$message]);
		}
  }
  
	public function uploadIOCFile($request, $input)
	{
			$iocFile = $request->file('fileToUpload');
			$input['destinationPath'] = $this->folder."/".$this->finYear()."/";
			$filename = $this->uploadFile($iocFile, $input);
			return $filename;
	}
	
	public function toDb($ioc, $input)
	{
		if($input['purpose'] == "new")
		{
			$ioc->comments = $this->addTimeStamp("Submitted");
		}
		
		if($input['purpose'] == "edit") 
		{
			$ioc->comments = $this->addTimeStamp("Edited");
		}
			
		$ioc->employee_id = Auth::id();
		$ioc->date_submitted = date('Y-m-d');
		$ioc->notes = $this->addTimeStamp("None");
		$ioc->status = 1;			

		$response = $ioc->save();	
			
		return $response;
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
		if( Auth::user()->hasAnyRole(['employee']) )
		{
			$communication = Communication::with('user')
							->where('uuid', $id)->first();
							
			$filename = $communication->filename; 
			$uuid = $id; 																
		
			//pass user and roles data to view
			return view('communications.newEdit', 
					compact('communication','filename','uuid'));
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
    public function update(IOCEditRequest $request, $id)
    {
      
      //dd($id);   
      if( Auth::user()->hasAnyRole(['employee']) )
      {
      
        $ioc = Communication::where('uuid', $id)->first();
        
        //Retrieving only the description
        $input = $request->validated();
        
        $input['purpose'] = "edit";
        
        $input['old_file'] = $ioc->filename;
        
        if($request->hasFile('fileToUpload'))
        {
          $ioc->filename = $this->uploadIOCFile($request, $input);
          $ioc->folder = $this->folder;
          $ioc->year = $this->finYear();
        }
        else {
          $input['filename'] = "none";
        }
			
        //$input['folder'] = $this->folder;
        
        //$input['year'] = $this->finYear();
        
        $doSave = $this->toDb($ioc, $input);
        
        $hopEntry = Hop::where('uuid', $id)->first();
        
        if( empty($hopEntry) )
        {
          // now make entry in hops table
          $resp = $this->makeNewHopEntry($this->controller, $id);
        }
			
          //Redirect to the users.index view and display message
          return redirect()->route('iocomms.index')
								->with('flash_message',
								'Communication successfully updated.');
      }
      else {
        $message =  "Required Permission Not Found";
        session()->flash("error", "Required Permission Not Found");
        return redirect()->back()->withErrors(['errors'=>$message]);
      }
    }

	public function commentIOC(Request $request, $id)
	{
		if( Auth::user()->hasAnyPermission(['ioc_comment', 'ioc_comment']))
		{
			$ioc = Communication::where('uuid', $id)->first();
			
			//Validate name, email and password fields
			$this->validate($request, [
				'comment' =>    'required|regex:/^[\pL\s\-.,_ :;0-9]+$/u|max:250',
			]);
			
			//Retrieving only the description
			$input = $request->only('comment');
			
			return view('communications.decisionAdminDir', 
									compact('comdetails', 'pathBreadCrumb','bcrumb', 'userGroup'));
		}
		else {
			$message =  "Required Permission Not Found";
			return redirect()->back()->withErrors(['errors'=>$message]);
		}
	}

	public function decision(Request $request, $id)
	{
		if( Auth::user()->hasAnyPermission(['ioc_decision', 'ioc_approval']))
		{
			$userGroup = $this->usersByRoles();
		
			$comdetails = $this->commByUuid($id);

			$pathBreadCrumb = $this->pathBreadCrumb($id);
		
			$bcrumb = $this->breadCrumbArray($id);

			return view('communications.decisionAdminDir', 
									compact('comdetails', 'pathBreadCrumb','bcrumb', 'userGroup'));
		}
		else {
			$message =  "Required Permission Not Found";
			return redirect()->back()->withErrors(['errors'=>$message]);
		}
	}

	public function postDecision(Request $request, $id)
	{	
		if( Auth::user()->hasAnyPermission(['ioc_decision', 'ioc_approval']))
		{
			$uuid = $id;
			
			$comms = Communication::where('uuid', $uuid)->first();

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
			
			$result = $this->dri->updateDecision($request, $comms);
		
			return redirect()->route('iocomms.index')
                        ->with('flash_message',
                         'Communication Decisions Updated'); 
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
