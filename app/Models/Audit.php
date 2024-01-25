<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Audit extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'audit_id';
	
	protected $fillable = [
		'employee_id',
		'value',
	];
}
