<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Hop extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'uuid';
		
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'uuid',
		'step_id',				
		'from_id', 
		'next_id',
		'path'
    ];
		
	public function leaves()
	{
		return $this->hasMany(Hop::class, 'uuid', 'uuid');
	}
		
	public function scopeNextId($query, $id)
    {
        return $query->where('next_id', $id);
    }

}
