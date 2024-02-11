<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Teaminvitations extends Model
{
    use HasFactory;
    use HasRoles;
    
    protected $table = 'team_invitations';  
    
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
	 
  protected $fillable = [
      'team_id', 
      'email',
      'role'   
  ];      
      
      
      
      
 
}
