<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Projtask extends Model
{
  use HasFactory;
	use HasRoles;
		
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'projtask_id';
	
	protected $fillable = [
    'projtask_id',
    'project_id',
    'projectgoal_id',
    'taskowner_id',
    'uuid',
    'activity',
    'task_desc',
    'img_files',
    'doc_files',
    'date_posted',
    'updated_by',
    'percent_progress',
    'comment',
	];
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'updated_by');
	}

	public function taskowner()
	{
		return $this->hasOne(User::class, 'id', 'taskowner_id');
	}
	
	public function project()
	{
		return $this->hasOne(Project::class, 'project_id', 'project_id');
	}
	
	public function goal()
	{
		return $this->hasOne(Projectgoals::class, 'uuid', 'uuid');
	}
}
