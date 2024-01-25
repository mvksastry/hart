<?php 
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Webpatser\Uuid\Uuid;

use App\Models\Tour;
use App\Models\Hop;
use App\Models\User;
use App\Models\Group;

use App\Traits\Baseinfo;
use App\Traits\Comments;
use App\Traits\Fileupload;
use App\Traits\Groupidentity;
use App\Traits\Nexthop;
use App\Traits\Checks;
use App\Traits\Queries;
use App\Traits\Trail;

use File;

trait Tourhandler 
{
	use Baseinfo, Trail, Comments, Fileupload, Groupidentity, Nexthop, Queries, Checks;
		
  protected $user;
	
  public function processTourProposal($input)
  {
    $result = $this->tourProposalChecks($input);
    
    if($result['check'])
    {
      if(array_key_exists('uuid', $input))
      {
        // doing editing: edit existing record
        $tour = Tour::where('uuid', $input['uuid'])->first();
      }
      else {
        // generate for new record.
        $uuid = Uuid::generate()->string;
        $tour = new Tour();
        
        $desigPayscale = $this->designationPayscale();
      //dd($desigPayscale);
        foreach($desigPayscale as $val)
        {
          $tour->designation = $val->designation;
          $tour->basic_pay = $val->basic_pay;	
        }
      }
      
      $tour->uuid = $uuid;
      $tour->employee_id = Auth::id();
      $tour->budget_head	= $input['budget_head'];
      $tour->tour_purpose	= $input['tour_purpose'];
      $tour->journey_mode	= $input['journey_mode'];
      $tour->journey_class	= $input['journey_class'];
      $tour->tada_advance	= $input['tada_advance'];
            
      $tour->dep_station	= $input['dep_station'];
      $tour->dep_station_date	= $input['dep_station_date'];
      $tour->dep_station_time	= $input['dep_station_time'];
            
      $tour->destination	= $input['destination'];
      $tour->dest_arr_date	= $input['dest_arr_date'];
      $tour->dest_arr_time	= $input['dest_arr_time'];
            
      $tour->rj_station	= $input['rj_station'];
      $tour->rj_station_date	= $input['rj_station_date'];
      $tour->rj_station_time	= $input['rj_station_time'];
            
      $tour->rj_origin	= $input['rj_origin'];
      $tour->rj_origin_arr_date	= $input['rj_origin_arr_date'];
      $tour->rj_origin_arr_time	= $input['rj_origin_arr_time'];

      $tour->comments = $this->addTimeStamp('Submitted');			
      $tour->comments = $tour->comments.';;; Uuid:'.$uuid;
      $tour->notes = $this->addTimeStamp('None');	
      
      $tour->tour_status = 1;
      $tour->date_submitted = date('Y-m-d');
      
      $result = $tour->save();
      
      $resp = $this->makeNewHopEntry($input['controller'], $uuid);
  
      if($result && $resp)
      {
        return true;
      }
      else {
        return false;
      }
    }
    else {
      $message = $result['message'];
      return redirect()->back()->withErrors(['errors'=>$message]);
    }
  }
  
  
	public function processEventProposal($input)
	{
		$result = $this->tourProposalChecks($input);
		
		if($result['check'])
		{
			if(array_key_exists('uuid', $input))
			{
				// doing editing: edit existing record
				$tour = Tour::where('uuid', $input['uuid'])->first();
			}
			else {
				// generate for new record.
				$uuid = Uuid::generate()->string;
				$event = new Event();
			}
			
			$event->uuid = $uuid;
			$event->employee_id = Auth::id();
			$event->budget_head	= $input['budget_head'];
			$event->tour_purpose	= $input['tour_purpose'];
			$event->journey_mode	= $input['journey_mode'];
			$event->journey_class	= $input['journey_class'];
			$event->tada_advance	= $input['tada_advance'];
			$event->comments = $this->addTimeStamp('Submitted');			
			$event->comments = $event->comments.';;; Uuid:'.$uuid;
			$event->tour_status = 1;
			$event->date_submitted = date('Y-m-d');
			$result = $tour->save();
      
			$resp = $this->makeNewHopEntry($input['controller'], $uuid);
      
			if($result && $resp)
			{
				return true;
			}
			else {
				return false;
			}
		}
		else {
			$message = $result['message'];
			return redirect()->back()->withErrors(['errors'=>$message]);
		}
	}	
	
	

	public function editTourProposal($input)
	{
    /*
		if( Auth::user()->hasRole('researcher') )
		{
			$route = $this->routeResearcherTour();
		}
		
		if( Auth::user()->hasRole('staff') )
		{
			$route = $this->routeStaffTour();
		}
		
		if( Auth::user()->hasRole('employee') )
		{
			$route = $this->routeEmployeeTour();
		}
    */
    
		// overlapping dates
		$res = Tour::where('dep_station_date', '<', $input['rj_origin_arr_date'])
										->where('rj_origin_arr_date', '>', $input['dep_station_date'])
										->where('employee_id', Auth::id())
										->get();
										
		//check dates for ealier and later for departure and arrival
		if( strtotime($input['dep_station_date']) > strtotime($input['dest_arr_date']) ||
				strtotime($input['dep_station_date']) > strtotime($input['rj_station_date']) ||
				strtotime($input['dep_station_date']) > strtotime($input['rj_origin_arr_date']) )
		{
			$message =  "Departure date is later than other journey dates";
			return redirect()->back()->withErrors(['errors'=>$message]);				
		}
		
		//check dates for ealier and later for departure and arrival
		if( strtotime($input['rj_origin_arr_date']) <= strtotime($input['rj_station_date']) )
		{
			$message =  "Return Journey Dates are wrong";
			return redirect()->back()->withErrors(['errors'=>$message]);				
		}
		
		//check whether a tour is already posed with same dates.
		if( count($res) > 0 )
		{
			$message =  "One Pending Tour Application, Overlapping the sames dates";
			return redirect()->back()->withErrors(['errors'=>$message]);
		}	
		
		// switch statement to decide journey class entitled.
		
		//generate uuid for global tracking
		$uuid = Tour::where('tour_id', $input['tour_id'])->pluck('uuid')->first();
		
		$input['tour_status'] = 2;
		
		$result = Tour::where('uuid', $uuid)->update($input);
		
		if($result)
		{
			return true;
		}
		else {
			return false;
		}
	}
}