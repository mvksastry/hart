<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Leave extends Model
{
  use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'leave_id';
	
	protected $guard_name = 'web'; 
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'leavetype_id',
		'employee_id',
		'leave_start',
		'leave_start_session',
		'leave_end',
		'leave_end_session',
		'total_days',
		'leave_reason',
		'comments',
		'notes',
		'submission_date',
		'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	public function leavetype()
    {
		return $this->hasOne(Leavetype::class, 'leavetype_id', 'leavetype_id');
    }
		
	public function user()
    {
		return $this->hasOne(User::class, 'id', 'employee_id');
    }
		
	public function hops()
	{
		return $this->hasMany(Hop::class, 'uuid', 'uuid');
	}
}
