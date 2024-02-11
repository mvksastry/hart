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
      'name',
      'personal_team',       
  ];      
    
}
