<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Tour extends Model
{
    use HasFactory;
	use HasRoles;
		
	protected $primaryKey = 'tour_id';
	
	protected $fillable = [
			'budget_head',
			'employee_id',
			'designation',
			'basic_pay',
			'tour_purpose',
			'journey_mode',
			'journey_class',
			'dep_station',
			'dep_station_date',
			'dep_station_time',
			
			'destination',
			'dest_arr_date',
			'dest_arr_time',
			'rj_station',
			'rj_station_date',
			'rj_station_time',
			'rj_origin',
			'rj_origin_arr_date',
			'rj_origin_arr_time',
			'tada_advance',
			'comments',
			'notes',
			'tour_status',
			'uuid',
			'communication_uuid',
			'date_submitted'
	];
}
