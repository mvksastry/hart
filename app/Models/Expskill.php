<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Expskill extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'expskill_id';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'expskill_id',
    ];
}
