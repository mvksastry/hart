<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Holiday extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'holiday_id';
	
	protected $fillable = [
	
				'holiday_date',
				'holiday_name',
				'holiday_type',
				'posted_by',
				'edited_by'
	
	];
}
