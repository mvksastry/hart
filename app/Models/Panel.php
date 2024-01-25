<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Panel extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $table = 'panels';

	
	
	protected $fillable = [
		'committee_id',
		'employee_id',
		'role_id',
	];
		
	public function users()
    {
		return $this->hasMany(User::class, 'id', 'employee_id');
    }
		
	public function roles()
    {
		return $this->hasMany(Role::class, 'id', 'role_id');
    }
		
	public function committees()
    {
		return $this->hasOne(Committee::class,'committee_id', 'committee_id');
    }
				
	public function name()
	{
		return $this->hasOne(User::class,'id', 'employee_id');
	}
			
	public function scopeRole($query, $role_id)
	{
		return $query->where('role_id', $role_id);
	}
	
	public function scopeCommitteeId($query, $committee_id)
	{
		return $query->where('committee_id', $committee_id);
	}
}
