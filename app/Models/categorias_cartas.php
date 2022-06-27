<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias_cartas extends Model
{
    use HasFactory;
	public $timestamps = false;

	public function viaturas()
	{
		return $this->hasMany(Viaturas::class);
	}

	public function userCats()
	{
		return $this->hasMany(userCats::class);
	}
}
