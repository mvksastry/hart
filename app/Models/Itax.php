<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Itax extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $table = 'itax';

	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'itax_id';
	
	protected $fillable = [
		'employee_id',
		'rent_paid',
		'll_name',
		'll_address',
		'll_pan',
		'hli_paid',
		'hl_lender_name',
		'hl_lender_address',
		'hl_lender_pan',
		'sec_80C_1', 
		'sec_80C_2',
		'sec_80C_3',
		'sec_80C_4',
		'sec_80C_5',
		'sec_80C_6',
		'sec_80C_7',
		'sec_80C_8',
		'sec_80C_9',
		'sec_80C_10',
		'sec_80C_11',
		'sec_80C_12',
		'sec_80C_13',
		'sec_80C_14',
		'sec_80C_15',
		'80CCC',
		'sec_80CCD_1',
		'sec_80CCD_1B',
		'sec_80CCD_2',
		'sec_80CCG',
		'sec_80D',
		'sec_80DD',
		'sec_80DDB',
		'sec_80E',
		'sec_80EE',
		'sec_80G',
		'sec_80GG',
		'sec_80GGA',
		'sec_80GGB',
		'sec_80GGC',
		'sec_80TTA',
		'sec_higher_studies',
		'sec_relief_charity'
	];
	
	public function user()
    {
		return $this->hasOne(User::class, 'id', 'employee_id');
    }
		
	public function employee()
    {
      return $this->hasOne(Employee::class, 'employee_id', 'employee_id');
    }
}
