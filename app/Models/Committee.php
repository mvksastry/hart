<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Committee extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'committee_id';
	
	protected $fillable = [
		'committee_id',
		'uuid',
		'title',
		'frequency',
		'mandate',
		'start_date',
		'end_date'
    ];
		
	public function panels()
    {
		return $this->hasMany(Panel::class, 'committee_id', 'committee_id');
    }
}
