<?php

namespace App\Traits;

use App\Models\Payrate;
use App\Models\Leave;
use App\Models\Tour;

trait PayrollMethods
{
    //
	
	public function da_percent()
	{
		return Payrate::where('item', 'da')->pluck('value')->first();
	}
	
	public function hra_percent()
	{
		return Payrate::where('item', 'hra')->pluck('value')->first();
	}
	
	public function pf_rate()
	{
		return Payrate::where('item', 'pf')->pluck('value')->first();
	}
	
	public function gsli()
	{
		return Payrate::where('item', 'gsli')->pluck('value')->first();
	}
	
	public function profession_tax()
	{
		return Payrate::where('item', 'ptax')->pluck('value')->first();
	}
	
	public function welfare()
	{
		return Payrate::where('item', 'welfare')->pluck('value')->first();
	}
	
	
	public function da($basic, $da_percent)
	{		
		return round((($basic*$da_percent)/100));
	}
	
	public function hra($basic)
	{
		return round((($basic*$this->hra_percent())/100));
	}
		
	public function ta($level_id, $da_percent)
	{
		$city = Payrate::where('item', 'city_ua')->pluck('value')->first();
		
		switch ($level_id) {
		case "18":
			$city =="1" ? $base = 7200 : $base = 3600; // returns true
        break;
		case "16":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "15":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "14":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "13":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "13A":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "12":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "11":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "10":
			$city =="1" ? $base = 7200 : $base = 3600;
        break;
		case "9":
			$city =="1" ? $base = 3600 : $base = 1800;
        break;
		case "8":
			$city =="1" ? $base = 3600 : $base = 1800;
        break;
		case "7":
			$city =="1" ? $base = 3600 : $base = 1800;
        break;
		case "6":
			$city =="1" ? $base = 3600 : $base = 1800;
        break;
		case "5":
			$city =="1" ? $base = 3600 : $base = 1800;
        break;
		case "4":
			$city =="1" ? $base = 3600 : $base = 1800;
        break;
		case "3":
			$city =="1" ? $base = 3600 : $base = 1800;
        break;
		case "2":
			$city =="ua" ? $base = 1350 : $base = 900;
        break;
		case "1":
			$city =="1" ? $base = 1350 : $base = 900;
        break;
		default:
        $base = 900;
		} 
		
		return ($base + round(($base*($da_percent)/100)));
	}
	
	public function monthLongLeave($employee_id)
	{
		$firstDayMonth = date('Y-m-01');
		$lastDayMonth = date('Y-m-t');
		$res = Leave::where('employee_id', $employee_id)
						->where('leave_start', '<=', $firstDayMonth)
						->where('leave_end', '>=', $lastDayMonth)
						->get();
		
		if(count($res) == 0)
		{
			return false;
		}
		else{
			return true;
		}
	}
	
	public function monthLongTour($employee_id)
	{
		$firstDayMonth = date('Y-m-01');
		$lastDayMonth = date('Y-m-t');
		$res = Tour::where('employee_id', $employee_id)
						->where('dep_station_date', '<=', $firstDayMonth)
						->where('rj_origin_arr_date', '>=', $lastDayMonth)
						->get();
		if(count($res) == 0)
		{
			return false;
		}
		else{
			return true;
		}
	}
	
	public function pf($basic, $da_percent, $pf_rate)
	{
		return round(((($basic + $this->da($basic, $da_percent))*$pf_rate)/100));
	}
}