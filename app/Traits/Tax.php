<?php

namespace App\Traits;

use App\Itax;

trait Tax
{
    //
	public function saveTaxInfo($input)
	{
		$itax = new Itax();
		$itax->rent_paid =           $input['rent_paid'];
		$itax->ll_name =             $input['ll_name'];
		$itax->ll_address =          $input['ll_address'];
		$itax->ll_pan =              $input['ll_pan'];
		$itax->hli_paid =            $input['hli_paid'];
		$itax->hl_lender_name =      $input['hl_lender_name'];
		$itax->hl_lender_address = $input['hl_lender_address'];
		$itax->hl_lender_pan =       $input['hl_lender_pan'];
		$itax->sec_80C_1 =           $input['sec_80C_1']; 
		$itax->sec_80C_2 =           $input['sec_80C_2'];
		$itax->sec_80C_3 =           $input['sec_80C_3'];
		$itax->sec_80C_4 =           $input['sec_80C_4'];
		$itax->sec_80C_5 =           $input['sec_80C_5'];
		$itax->sec_80C_6 =           $input['sec_80C_6'];
		$itax->sec_80C_7 =           $input['sec_80C_7'];
		$itax->sec_80C_8 =           $input['sec_80C_8'];
		$itax->sec_80C_9 =           $input['sec_80C_9'];
		$itax->sec_80C_10 =          $input['sec_80C_10'];
		$itax->sec_80C_11 =          $input['sec_80C_11'];
		$itax->sec_80C_12 =          $input['sec_80C_12'];
		$itax->sec_80C_13 =          $input['sec_80C_13'];
		$itax->sec_80C_14 =          $input['sec_80C_14'];
		$itax->sec_80CCC =           $input['sec_80CCC'];
		$itax->sec_80CCD_1 =         $input['sec_80CCD_1'];
		$itax->sec_80CCD_1B =        $input['sec_80CCD_1B'];
		$itax->sec_80CCD_2 =         $input['sec_80CCD_2'];
		$itax->sec_80CCG =           $input['sec_80CCG'];
		$itax->sec_80D =             $input['sec_80D'];
		$itax->sec_80DD =            $input['sec_80DD'];
		$itax->sec_80DDB =           $input['sec_80DDB'];
		$itax->sec_80E =             $input['sec_80E'];
		$itax->sec_80EE =            $input['sec_80EE'];
		$itax->sec_80G =             $input['sec_80G'];
		$itax->sec_80GG =            $input['sec_80GG'];
		$itax->sec_80GGA =           $input['sec_80GGA'];
		$itax->sec_80GGB =           $input['sec_80GGB'];
		$itax->sec_80GGC =           $input['sec_80GGC'];
		$itax->sec_80TTA =           $input['sec_80TTA'];
		$itax->sec_higher_studies =  $input['sec_higher_studies'];
		$itax->sec_relief_charity =  $input['sec_relief_charity'];
		$itax->tds_buffer =  				 $input['tds_buffer'];
		
		$response = $itax->save();
		
		return $response;
	}
	
	public function sec80aggregate($model)
	{
		$sec80agg = 0.00;		
		foreach($model as $itax)
		{
			$sec80agg = $sec80agg + $itax->sec_80C_1; 
			$sec80agg = $sec80agg + $itax->sec_80C_2;
			$sec80agg = $sec80agg + $itax->sec_80C_3;
			$sec80agg = $sec80agg + $itax->sec_80C_4;
			$sec80agg = $sec80agg + $itax->sec_80C_5;
			$sec80agg = $sec80agg + $itax->sec_80C_6;
			$sec80agg = $sec80agg + $itax->sec_80C_7;
			$sec80agg = $sec80agg + $itax->sec_80C_8;
			$sec80agg = $sec80agg + $itax->sec_80C_9;
			$sec80agg = $sec80agg + $itax->sec_80C_10;
			$sec80agg = $sec80agg + $itax->sec_80C_11;
			$sec80agg = $sec80agg + $itax->sec_80C_12;
			$sec80agg = $sec80agg + $itax->sec_80C_13;
			$sec80agg = $sec80agg + $itax->sec_80C_14; 
		}		
		return $sec80agg; 
	}
	
	public function sec80CCDagg($model)
	{
		$sec80CCD = 0.00;		
		foreach($model as $itax)
		{		
			$sec80CCD = $sec80CCD + $itax->sec_80D; 
			$sec80CCD = $sec80CCD + $itax->sec_80DD;
			$sec80CCD = $sec80CCD + $itax->sec_80DDB;
		}
		return $sec80ccd; 
	}
	
	public function sec80Dagg($model)
	{
		$sec80D = 0.00;		
		foreach($model as $itax)
		{		
			$sec80D = $sec80D + $itax->sec_80CCD_1; 
			$sec80D = $sec80D + $itax->sec_80CCD_1B;
			$sec80D = $sec80D + $itax->sec_80CCD_2;
		}
		return $sec80D; 
	}
	
	public function sec80Eagg($model)
	{
		$sec80E = 0.00;		
		foreach($model as $itax)
		{		
			$sec80E = $sec80E + $itax->sec_80E; 
			$sec80E = $sec80E + $itax->sec_80EE;
		}		
		return $sec80E; 
	}
	
	public function sec80Gagg($model)
	{		
		$sec80G = 0.00;		
		foreach($model as $itax)
		{		
			$sec80G = $sec80G + $itax->sec_80G; 
			$sec80G = $sec80G + $itax->sec_80GG;
			$sec80G = $sec80G + $itax->sec_80GGA;
			$sec80G = $sec80G + $itax->sec_80GGB;
			$sec80G = $sec80G + $itax->sec_80GGC;
		}
		return $sec80G; 
	}
	
	
	
}