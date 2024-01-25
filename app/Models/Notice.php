<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Notice extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'notice_id';
		
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'postedby_id',
		'description', 
		'filename',
		'addressed_to',
		'uuid'
    ];
}
