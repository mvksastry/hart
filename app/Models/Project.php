<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Project extends Model
{
  use HasFactory;
	use HasRoles;
		
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'project_id';
	
	protected $fillable = [
    'employee_id',
    'project_leader',
    'office_reference',
    'date_submitted',
    'project_file',
    'agency',
    'title',
    'description',
    'sanct_ref',
    'sanct_date',
    'sanct_file',
    'sanct_checked_by',
    'start_date',
    'end_date',
    'duration',
    'total_budget',
    'ext_reference',
    'ext_from',
    'ext_end',
    'ext_file',
    'ext_amount',
    'misc',
    'comments',
    'status',
    'folder',
    'year',
    'uuid'
	];
  
  public function proj_owner()
  {
    return $this->hasOne(User::class, 'id', 'employee_id');
  }
  
  public function proj_lead()
  {
    return $this->hasOne(User::class, 'id', 'project_leader');
  }
  
  public function smart_goals()
  {
    return $this->hasMany(Projectgoals::class, 'uuid', 'uuid');
  }

  public function tasks()
  {
    return $this->hasMany(Projtasks::class, 'uuid', 'uuid');
  }  
  
}
