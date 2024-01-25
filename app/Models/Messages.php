<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Messages extends Model
{
  use HasFactory;
  use HasRoles;
	
	protected $primaryKey = 'message_id';
	
	protected $guard_name = 'web'; 
  
  protected $table = 'messages';
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = [
      'message_id',
      'employee_id',
      'subject',
      'message',
      'attention',
      'atten_group',
      'comments',
      'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	public function leavetype()
  {
    return $this->hasOne(Leavetype::class, 'leavetype_id', 'leavetype_id');
  }
		
	public function user()
  {
    return $this->hasOne(User::class, 'id', 'employee_id');
  }
}
