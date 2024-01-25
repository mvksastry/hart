<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Event extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'event_id';
	
	protected $fillable = [
		'employee_id',
		'event_type',
		'event_start',
		'event_end',
		'event_venue',
		'condition',
		'council',
		'comment'
	];
	
	public function evenType()
	{
		return $this->hasOne(Eventype::class, 'eventype_id', 'event_type');
	}
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'employee_id');
	}
}
