<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Leaverecord extends Model
{
    use HasFactory;
	use HasRoles;
		
	protected $primaryKey = 'leaverecord_id';

		
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'employee_id', 
		'eligible_leavetype_id', 
		'current_year',
		'current_year_credit_status',
		'current_year_credit',
		'current_year_consumed',
		'current_year_balance',
		'cumulative_balance'
    ];
		
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'employee_id');
	}
	
	public function leavetype()
    {
        return $this->hasOne(Leavetype::class, 'leavetype_id', 'eligible_leavetype_id');
    }
}
