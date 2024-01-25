<?php namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\LeaveRepositoryInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Webpatser\Uuid\Uuid;

use App\Models\Leave;
use App\Models\Leavetype;
use App\Models\Leaverecord;
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

trait Leavehandler
{
	use Baseinfo, Comments, Fileupload, Groupidentity, Nexthop, Trail, Queries, Checks;
		
    protected $user;

    public function __construct()
    {
        //  $user = Auth::user();
    }
		
	public function processUserLeaveCredit($input)
	{
		
		$input['current_year'] = date('Y');
		
		$carryForwardLeaves = 0;
		
		$curYearPostStatusNotDone = 0;
		
		//first check users leavetype id in leave record table
		
		$result = $this->getUserLeaverecordByLeaveType($input['eligible_leavetype_id'],
														$input['current_year'],
														$curYearPostStatusNotDone, 
														$input['employee_id']);
		
		//if no record: firstime entry
		if(count($result) == 0)
		{
			$input['current_year_credit_status'] = 1;
			$input['current_year_consumed'] =0;
			$input['current_year_balance'] = $input['current_year_credit'] - $input['current_year_consumed'];
			$input['cumulative_balance'] = $this->cumulativeBalance($input['current_year_balance'], $carryForwardLeaves);
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
			
			if($result){
				return true;
			}
			else {
				return false;
			}
			
		}
		else {
			return false;
		}			
	}
		
		
		
	public function cumulativeBalance($current_year_balance, $carryForwardLeaves)
	{
		return $current_year_balance + $carryForwardLeaves;
	}
	
	public function getUserLeaverecordByLeaveType($leavetype_id,$current_year,$curYearPostStatusNotDone, $employee_id)
	{
		return Leaverecord::where('eligible_leavetype_id', $leavetype_id)
							->where('employee_id', $employee_id)
							->where('current_year', $current_year)
							->where('current_year_credit_status', $curYearPostStatusNotDone)
							->get();
	}

    public function getLeavesConsumedByLeaveType($leavetype_id, $employee_id)
	{
		$result = Leave::where('eligible_leavetype_id', $leavetype_id)
									->where('employee_id', $employee_id)->get();
		return $result->current_year_consumed;
	}

    public function processMassPostNewLeaves()
	{
		//first check whether it is new year or not
		//if yes
		$current_year = date('Y');
		
		//current_year_credit_status 1 means first half credits
		//current_year_credit_status 2 means second half credits
		//values from config table for testing these are simply put here
		$newLeaveNumberToAdd = 45;
		
		$cumulativeBalanceLimit = 90;
		
		$carryForwardAllowed = 20;
		
		
		//now get all records from db as an object
		$leaveRecords = Leaverecord::all(); 
		//the record retrieval in future is based on active status of users.
		
		foreach($leaveRecords as $leaveRecord)
		{

			$leaveRecordId = $leaveRecord->leaverecord_id;
			
			$dbCurrentYear = $leaveRecord->current_year;
			
			//echo $dbCurrentYear;echo "<br/>";
	
			if( ($current_year - $dbCurrentYear) >= 1) 
			{
	
				$curYearBalance = $leaveRecord->current_year_balance;
				
				//echo $curYearBalance;echo "<br/>";
			
				if( $curYearBalance < $carryForwardAllowed)
				{
					$carryForwardAllowed = $curYearBalance;
				}
				
				//echo $carryForwardAllowed; echo "<br/>";
				//now add new leave plus carryforward leaves
				$newCurYearBalance =  $newLeaveNumberToAdd;
			
				//echo $newCurYearBalance;echo "<br/>";
				$newCumulativeBalance = $newCurYearBalance + $carryForwardAllowed;
				//echo $newCumulativeBalance;echo "<br/>";
				if( $newCumulativeBalance > $cumulativeBalanceLimit )
				{
					$newCumulativeBalance = $cumulativeBalanceLimit;
				}
			
				$leaverecord_id = $leaveRecord->leaverecord_id;
				$researcher_id = $leaveRecord->researcher_id;
				$eligible_leavetype_id = $leaveRecord->eligible_leavetype_id;

				$input = array(
							'current_year' => $current_year,
							'current_year_credit_status' => 1,
							'current_year_credit' => $newLeaveNumberToAdd,
							'current_year_consumed' => 0,
							'current_year_balance' => $newCurYearBalance,
							'cumulative_balance' => $newCumulativeBalance
							);
							
				//dd($input);
							
				try {
					DB::beginTransaction();
					$result = Leaverecord::where('leaverecord_id',$leaveRecordId)
											->where('employee_id', $employee_id)
											->where('eligible_leavetype_id', $eligible_leavetype_id)
											->update($input);
					DB::commit();
				} catch (\Exception $e) {
					DB::rollback();
					throw $e;
					// something went wrong
				} catch (\Throwable $e) {
					DB::rollback();
					throw $e;
				}					
			}							
		}
	}
		
		
		
		
	// this function is used for posting 8 casual leaves to all employees.
	/* Three checks must be performed
			1. Check current year in db. it shoud be done only once a year.
			2. No carry forward.
			3. Only 8 leaves will be added to all employees.
	 */
	public function postNewCasualLeaves()
	{
		
		
	}
		
	// this function is used for posting 15 + 15 earned leaves to all employees.
	/* Three checks must be performed
			1. Check current year in db. it shoud be done only twice a year.
			2. Carry forward allowed
			3. 15 in first half and 15 in second half.
	 */
	public function postNewEarnedlLeaves()
	{
		
		
	}
		
	// this function is used for posting 10 + 10 earned leaves to all employees.
	/* Three checks must be performed
			1. Check current year in db. it shoud be done only twice a year.
			2. Carry forward allowed
			3. 15 in first half and 15 in second half.
	 */
	public function postNewHalfPayLeaves()
	{
		
		
	}
		
	// this function is used for all leaves for all roles.
	/* Three checks must be performed
			1. Check Cumulative balance, proceed only if leaves left
			2. Neither dates can be earlier than day of submission
			3. Leave end date must same or later than start date
			4. Check no other leave application is pending overlapping 
			   with the dates applied. 
	 */
	
	public function processLeave($input)
	{
		$result = $this->leaveConditionChecks($input);
		
		$clTypeId = Leavetype::where('leavetype_name', 'Casual Leave')->first();
		
		if($result['check'])
		{
			$totalSatSun = $this->totalSatSunInLeave($input['leave_start'], $input['leave_end']);
			
			if( intval($input['leavetype_id']) == $clTypeId->leavetype_id )
			{
				$numSatSunInLeaveDates = (($this->numberOfDays($input)) - $totalSatSun);
				
				if( ($numSatSunInLeaveDates == 0 ) )
				{
					$input['comments'] = $input['comments'].';;; Treated as Station Leave';
				}
				
			}
			else {
				$numSatSunInLeaveDates = 0;
			}
			
			
			if($input['purpose'] == "edit")
			{
				// doing editing: edit existing record
				$leave = Leave::where('uuid', $input['uuid'])->first();
        $uuid = $input['uuid'];
			}
			else {
				// generate for new record.
				$uuid = Uuid::generate()->string;
				$leave = new Leave();
			}

			$leave->leavetype_id = $input['leavetype_id'];
			$leave->employee_id = $input['employee_id'];
			$leave->leave_start = $input['leave_start'];
			$leave->leave_start_session = $input['leave_start_session'];
			$leave->leave_end = $input['leave_end'];
			$leave->leave_end_session = $input['leave_end_session'];
			$leave->total_days = ($this->numberOfDays($input))-($numSatSunInLeaveDates);
			$leave->leave_reason = $input['leave_reason'];
			$leave->comments = $input['comments'].';;; Uuid:'.$uuid;
			$leave->notes = $input['notes'];
			$leave->submission_date = date('Y-m-d');
			$leave->leave_status = 1;
			$leave->uuid = $uuid;

			$result = $leave->save();
		
      if($input['purpose'] == "new")
      {
        $resp = $this->makeNewHopEntry($input['controller'], $uuid);
      }
      else {
        $resp = true;
      }
	
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
	
	/*
	public function leaveDecision($input)
	{
		
		$uuid = $input['uuid'];
		$leave_id = Leave::where('uuid', $uuid)->pluck('leave_id')->first();
		$decision = $input['decision'];
		
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
		
		$leave = Leave::where('uuid', $uuid)->first();
		$leave->comments = $input['comments'];
		
		if($currentPath[$currentStepKey]['step_id'] < $totalSteps )
		{
			$currentPath[$currentStepKey]['status'] = "complete";
				
			$nextStepKey = $this->defaultNextStepKey($currentPath);
				
			$hop->step_id = $currentPath[$nextStepKey]['step_id'];
			$hop->from_id = Auth::id();
			$hop->next_id = $currentPath[$nextStepKey]['id'];
			$hop->path = json_encode($currentPath, true);
			
			$hop->save();
			
			//till final decision is made, status is pending
			$leave->leave_status = 2;

			$result = $leave->save();
		}
		else {
			$currentPath[$currentStepKey]['status'] = "complete";
			$hop->path = json_encode($currentPath, true);
			
			$hop->save();
			
			$leave->leave_status = $decision;

			$leave->save();

			//this if check is correct, 
			//only update db if decision is approved
			if($decision == 5)
			{
				//update record only if decision is approved.
				$result = $this->updateLeaverecordDB($leave_id);
			}
		}
		
		if($result)
		{
			return true;
		}
		else {
			return false;
		}
	}
	*/
		
	public function updateLeaverecordDB($leave_id)
	{
		$lvx = Leave::where('leave_id', $leave_id)->get();
		
		foreach($lvx as $val)
		{
			$employee_id = $val->employee_id;
			$leavetype_id = $val->leavetype_id;
			$start_date = $val->leave_start;
			$end_date = $val->leave_end;
			$numDays = $val->total_days;
		}
					
		$result = Leaverecord::where('employee_id', $employee_id)
															->where('eligible_leavetype_id', $leavetype_id)
																->get();
		foreach( $result as $val )
		{
			$leaverecord_id = $val->leaverecord_id;
			$leaveBalance = $val->current_year_balance;
			$leaveConsumed = $val->current_year_consumed;
			$cumulativeBalance = $val->cumulative_balance;
		}

		$lvrecord = Leaverecord::find($leaverecord_id);
		
		$lvrecord->current_year_consumed = $leaveConsumed + $numDays;
		$lvrecord->current_year_balance = $leaveBalance - $numDays;
		$lvrecord->cumulative_balance = $cumulativeBalance - $numDays;

		$result = $lvrecord->save();
		
		if($result)
		{
			return true;
		}
		else {
			return false;
		}
	}

////////////////////////////////////////////////////////

}
