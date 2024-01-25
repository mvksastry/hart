<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Leavetype extends Model
{
    use HasFactory;
	use HasRoles;
		
	protected $primaryKey = 'leavetype_id';	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'eligible_gender_id',
		'eligible_role_id',
		'leavetype_id',
		'leavetype_name',
		'leave_conditions',
		'leave_limit_peryear',
		'carriable',
		'carried_on_limit',
		'cumulative_ceiling',
		'posted_by',
		'edited_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	public function leaves()
    {
		return $this->hasMany(Leave::class, 'leavetype_id', 'leavetype_id');
    }
		
	public function leaveRecord()
    {
		return $this->hasMany(Leaverecord::class, 'eligible_leavetype_id', 'leavetype_id');
    }
		
	public function role()
	{
		return $this->hasOne(Role::class, 'id', 'eligible_role_id');
	}
}
