<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Communication extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'communication_id';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'employee_id', 
		'date_submitted', 
		'subject',
		'description', 
		'filename',
		'folder',
		'year',
		'comments',
		'notes',
		'uuid',
		'status'
    ];
		
	public function user()
    {
		return $this->hasOne(User::class, 'id', 'employee_id');
    }
		
	public function employee()
    {
		return $this->hasOne(Employee::class, 'employee_id', 'employee_id');
    }
		
	public function researcher()
    {
		return $this->hasOne(Researcher::class, 'researcher_id', 'employee_id');
    }
		
	public function groupleader()
	{
		return $this->hasMany(Groupx::class, 'groupleader_id', 'employee_id');
	}
	
	public function groupmember()
	{
		return $this->hasMany(Groupx::class, 'member_id', 'employee_id');
	}
}
