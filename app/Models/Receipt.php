<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Receipt extends Model
{
    use HasFactory;
	use HasRoles;
		
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'receipt_id';
	
	protected $fillable = [
		'employee_id',
		'uuid',
		'code',
		'date',
		'details',  
		'inst_number',
		'inst_amount',
		'total_paid',
		'status',
		'posted_by',
		'edited_by',
	];
}
