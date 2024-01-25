<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Advance extends Model
{
    use HasFactory;
	use HasRoles;
		
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'adv_id';
	
	protected $fillable = [
		'employee_id',
		'uuid',
		'code',
		'details',
		'principal',
		'interest',
		'total',
		'installments',
		'instmts_due',
		'inst_amount',
		'last_installment',
		'status',
		'posted_by',
		'edited_by'
	];
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'employee_id');
	}
}
