<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Eventype extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'eventype_id';
	
	protected $fillable = [
			'eventname',
			'eventdate',
			'description',
			'conditions',
			'posted_by',
			'edited_by'
	];
}
