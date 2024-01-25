<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Month extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'month_id';
}
