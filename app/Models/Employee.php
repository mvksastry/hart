<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $guard_name = 'web'; 
	
	protected $primaryKey = 'employee_id';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'employee_id', 
      'gender_id',
      'department',
      'birth_date',
      'join_date',
      'designation',
      'level_id',
      'basic_pay',
      'variable_pay',
      'increment_date',
      'office_phone',
      'mobile_phone1',
      'mobile_phone2',
      'validity_date',
      'address',
      'photofile',
      'folder_name',
      'website_link',
      'status',
      'tds',
      'suspension',
    ];
		
	public function user()
  {
		return $this->hasOne(User::class, 'id', 'employee_id');
  }
}
