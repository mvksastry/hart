<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Path extends Model
{
  use HasFactory;
	use HasRoles;
	
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'path_id';
	
	protected $fillable = [
		'role_id',
		'controller',
		'path',
		'posted_by'
	];
	
	public function roleName()
	{
		return $this->hasOne(Role::class,'id', 'role_id');
	}
}
