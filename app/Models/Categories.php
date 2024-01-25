<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Categories extends Model
{
    use HasFactory;
	use HasRoles;
	
	protected $primaryKey = 'category_id';

    public function user()
	{
        return $this->hasMany(Users::class, 'category_id', 'category_id');
    }
}
