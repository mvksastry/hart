<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Group extends Model
{
  use HasFactory;
	use HasRoles;
	
	protected $table = 'groups';
	
	//protected $primaryKey = ['groupleader_id', 'member_id'];


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
	 
  protected $fillable = [
      'groupleader_id', 
      'member_id',
  ];
		
	public function groupLeads()
	{
		return $this->hasOne(User::class, 'id', 'groupleader_id');
	}
		
	public function supervisors()
  {
    return $this->hasOne(Supervisor::class, 'supervisor_id', 'groupleader_id');
  }
		
	public function researchers()
  {
    return $this->hasMany(Researcher::class, 'researcher_id', 'member_id');
  }
		
		
	public function groupLeader()
  {
    return $this->hasOne(Supervisor::class, 'supervisor_id', 'groupleader_id');
  }
		
		
		
	public function groupLeaderName()
  {
    return $this->hasOne(User::class, 'id', 'groupleader_id');
  }
		
	public function memberName()
  {
    return $this->hasOne(User::class, 'id', 'member_id');
  }
		
	public function groupLeaders()
  {
    return $this->belongsToOne(Groupx::class,'member_id', 'groupleader_id');
  }
		
	public function members()
  {
    return $this->hasMany(Groupx::class, 'groupleader_id', 'groupleader_id');                
  }
		
	//below these two function should not be used anymore, to be used.
	//right now do not delete as these are used  in a few place.
	//the new equivalent functions are groupLeaderName and memberName
	/*
	public function supName()
    {
        return $this->hasOne(User::class, 'id', 'groupleader_id');
    }
			
	public function resName()
    {
        return $this->hasOne(User::class, 'id', 'member_id');
    }
	*/
		
		
	public function communications()
	{
		return $this->hasMany(Communications::class, 'researcher_id', 'member_id');
	}
}
