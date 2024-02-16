<?php

namespace App\Traits;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use DateTime;
use App\Models\Hop;

use App\Traits\Baseinfo;
use App\Traits\Comments;
use App\Traits\Groupidentity;
use App\Traits\Nexthop;
use App\Traits\Queries;
use App\Traits\Trail;


trait Decision
{
	use Baseinfo, Comments, Queries, Nexthop, Groupidentity, Trail;
	
	public function updateDecision($request, $model)
	{
    
    $decisions_array = array("0" => "None",
      "1" => "Submitted",    "2" => "Pending",	"3" => "Returned", 
      "4" => "Rejected",	   "5" => "Approved", "6" => "Forwarded", 
      "7" => "Under Review", "8" => "Notified", "9" => "Sealed" 
													);
                          
    $admin_actions = array("0" => "None",
													"1" => "Submitted",
													"2" => "Pending",
													"3" => "Returned",
													"4" => "Rejected",
													"5" => "Forwarded",
													"6" => "Under Review"
													);
                          
		$all_steps_complete = false;
		
		$uuid = $model->uuid;
		
		$input = $request->only('comments');
		
		$decis = $request->only('decision');
			
		if($request->has('notes'))
		{
			$notes = $request->only('notes');

			$model->notes = $this->addComment($model->notes, $notes['notes']);
		}
			
		if( Auth::user()->hasAnyRole('supervisor','team_leader') )
		{
			If($decis['decision'] == 3 || $decis['decision'] == 4)
			{
				// keep it in pending and cannot be edited
				// till a final decision is made by director
				// essentially locked for editing.
				$model->status = 2;
				
				//stopping further progress due to returned or rejected
				// simply activate the line.
				return $all_steps_complete;
			}
			else {
				$model->status = 2;
			}
		}
			
		$model->comments = $this->addComment($model->comments, $input['comments']);
			
		$model->comments = $this->addComment($model->comments, $decisions_array[$decis['decision']]);

		if( Auth::user()->hasRole('director') )
		{
			$model->status = $decis['decision'];
		}
			
		//decide route default or new path.
		if($request->has('path'))
		{
			$rx = $request->only('path');
		
			$route = $rx['path'];
		}
		else {
			$route = "default";
		}
			
    //route changed by admin or director
		if($route == "include")
		{
			$ts = $request->only('groupd');
			$tx = $ts['groupd'];
			
			$newPath = $this->makeNewPath($tx);
			
			$resp = $this->changeHopPath($newPath, $uuid);
			
			// since the request took new route, means
			// decision is under review.
			$model->decision = 6;
				
			$update = true;
		}
			
		if($route == "default")
		{
			//get route from the hops table.
			//remember that the request came here through default route.
			$currentPath = json_decode($this->currentPath($uuid), true);
			
			$totalSteps = count($currentPath); 
			//identify the step at which it needs modification
			// i.e. the incomplete status is to be changed 
			//to complete for the id of the person (which is
			// same as the person logged in)				
			
			$currentStepKey = $this->defaultNextStepKey($currentPath); 
			
			$hop = Hop::find($uuid);
			
			if($currentPath[$currentStepKey]['step_id'] < $totalSteps )
			{
				$currentPath[$currentStepKey]['status'] = "complete";
				
				$nextStepKey = $this->defaultNextStepKey($currentPath);
				
				$hop->step_id = $currentPath[$nextStepKey]['step_id'];
				$hop->from_id = Auth::id();
				$hop->next_id = $currentPath[$nextStepKey]['id'];
				
				$hop->path = json_encode($currentPath, true);
				
				$update = true;
			}
			else {
				$currentPath[$currentStepKey]['status'] = "complete";
				$hop->path = json_encode($currentPath, true);

				$model->status = $decis['decision'];

				$update = true;
				
				$all_steps_complete = true;
				
			}
		}
		
		if($update)
		{
			$hop->save();	
			$model->save();
			return $all_steps_complete;
		}
	}
}