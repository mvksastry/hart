<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Projectgoals extends Model
{

  use HasFactory;
	use HasRoles;
		
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'project_id'; 

  protected $table = 'projectgoals';
    
  protected $fillable = [
    'project_id',
    'goalowner_id',
    'goal',
    'desc',
    'budget',
    'est_time',
    'ref_files',
    'misc_info',
    'comments',
    'status',
    'folder',
    'uuid'
  ];
    
  public function goalowner()
  {
    return $this->hasOne(User::class, 'id', 'goalowner_id');
  }
  
  public function project()
  {
    return $this->hasOne(Project::class, 'uuid', 'uuid');
  }    
 
  public function goaltasks()
  {
    return $this->hasMany(Projtasks::class, 'uuid', 'uuid');
  } 
}
