<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Meeting extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $fillable = [
			
	];
	
	public function user()
    {
		return $this->hasMany(User::class, 'id', 'employee_id');
    }
}
