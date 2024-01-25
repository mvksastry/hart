<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Salary extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $table = 'salaries';

	
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'salary_id';
	
	protected $fillable = [
		'salary_id',
		'fin_year',
		'month',
		'earn_type',
		'employee_id',
		'basic',
		'da_rate',
		'da',
		'hra_rate',
		'hra',
		'ta',
		'oa1_name',
		'oa1',
		'oa2_name',
		'oa2',
		'oa3_name',
		'oa3',
		'oa4_name',
		'oa4',
		'oa5_name',
		'oa5',
		'oa6_name',
		'oa6',
		'oa7_name',
		'oa7',
		'oa8_name',
		'oa8',
		'oa9_name',
		'oa9',
		'oa10_name',
		'oa10',
		'total_income',
		'itax',
		'tds',
		'gsli',
		'pf',
		'prof_tax',
		'welfare',
		'home_loan',
		'two_wheeler_loan',
		'car_loan',
		'computer_loan',
		'advpay_transfer',
		'ta_adv_ttr',
		'ta_adv_sdfm',
		'ltc_advance',
		'od1_name',
		'od1',
		'od2_name',
		'od2', 
		'od3_name', 
		'od3', 
		'od4_name', 
		'od4', 
		'od5_name', 
		'od5', 
		'total_deductions', 
		'prepared_id', 
		'verified_id', 
		'approved_id'
	];
}
