<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class State extends Model
{
    use HasFactory;
	use HasRoles;
		
	protected $primaryKey = 'state_id';
}
