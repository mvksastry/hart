<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Teams extends Model
{
  use HasFactory;
  use HasRoles;
    
  protected $table = 'teams';  
      
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
	 
  protected $fillable = [
      'user_id', 
      'name',
      'personal_team',       
  ];      

	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
  
  public function team_role()
	{
		return $this->hasOne(Teamusers::class, 'team_id', 'id');
	}  
    
}
