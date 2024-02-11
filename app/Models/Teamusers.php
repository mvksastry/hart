<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Teamusers extends Model
{
    use HasFactory;
    use HasRoles;
    
    protected $table = 'team_user';  
      
      
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
	 
  protected $fillable = [
      'team_id', 
      'user_id', 
      'role',  
  ];      
      
      
      
      
 
}
