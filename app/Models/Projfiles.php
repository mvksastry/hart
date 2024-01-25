<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Projfiles extends Model
{
  use HasFactory;
	use HasRoles;
		
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'projfile_id'; 

  protected $table = 'projfiles';
  
  protected $fillable = [
      'projfile_id',
      'uuid',    
      'file_type',
      'file_name',
      'folder',
      'legend',
      'notes',
      'posted_by',
      'date_posted',
    ];
}
