<?php

namespace App\Traits;

use App\Models\Employee;
use App\Models\Payrate;
use App\Models\Leave;
use App\Models\Tour;

trait DaArrears
{
	public function ArrearsDA($input)
	{

		$curMonthEnd = date("Y-m-t", strtotime(date('Y-m-d')));
			
		//$oldDA = $this->da_percent();
		//$oldHRA = $this->hra_percent();
		//$oldPf = $this->pf_rate();
			
		$newDA = $input['newda'];
		$newHRA = $input['newhra'];
		$newPf = $input['newpf'];
				
		if(($newDA-$this->da_percent()) > 0)
		{

			$calcStartDate = $input['month'];
			$today = date('Y-m-d');
	
			$minTDS = Payrate::where('item','min_tds')->pluck('value')->first();
			
			// calculate for all salary entries latest.
			//first query from db table all the salary entries till date
			$payList = Employee::with('user')->get();
			
			//now foreach entry row, get the of da, ta pf aswell as basic

			foreach($payList as $emp)
			{
				$oldPr = Payroll::select('employee_id', 'basic', 'ta', 'hra', 'da', 'pf')
										->where('month', '>=', '$calcStartDate')
										->where('month', '<=', $curMonthEnd)
										->where('earn_type', '=', 'salary')
										->where('employee_id', $emp->employee_id)
										->get();
										
				foreach($oldPr as $val)
				{
					$pBasic = $val->basic;
					$daPaid = $val->da;
					$taPaid = $val->ta;
					$hraPaid = $val->hra;
					$pfPaid = $val->pf;							
				}
					$arPr = array();
				
					foreach($oldPr as $key => $val)
					{
						$arrPr = new Payroll();
				
						$arrPr->employee_id = $emp->employee_id;
						$arrPr->basic = 0;
						$arrPr->da =    $this->da($pBasic, $newDA) - $daPaid;
						$arrPr->da_rate = $newDA - $this->da_percent();
						$arrPr->hra =   $this->hra($pBasic) - $hraPaid;
						
						if($taPaid != 0)
						{
							$arrPr->ta = $this->ta($emp->level_id, $newDA) - $taPaid;
						}
						else{
							$arrPr->ta = 0;
						}
							
						$arrPr->pf =    $this->pf($pBasic,$newDA,$newPf) - $pfPaid;
					
						$arrPr->fin_year = date('Y');
						
						$arrPr->month = $input['month'];
						$arrPr->comments = $input['comment'];
						$arrPr->earn_type = 'DA_Arrears';
							
						$arrPr->date_prepared = date('Y-m-d');
						$arrPr->date_verified = date('Y-m-d');
						$arrPr->date_approved = date('Y-m-d');
							
						$arrPr->total_income= $arrPr->basic+
																$arrPr->da+
																$arrPr->ta+
																$arrPr->hra;
																
						$arrPr->tds = round(($minTDS * $arrPr->total_income)/100);
						$arrPr->total_deductions = 	$arrPr->tds+$arrPr->pf;
							
						$arrPr->save();
							
						unset($arrPr);
					}
				}

				//now since all calculations done, update payrates db.
				$result = Payrate::where('item', 'da')
											->update(['value'=>$newDA, 'effective_date'=>$calcStartDate]);
						
			return true;
		}
		else {
			return false;
		}
	}
}