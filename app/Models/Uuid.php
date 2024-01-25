<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB

class Uuid extends Model
{
    use HasFactory;
	use hasRoles;
	
	public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->uuid = (string)Uuid::generate();
		});
		
		return $model->uuid;
	}
}
