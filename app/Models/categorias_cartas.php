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
		return $this->hasMany(Viaturas::class, 'catCarta_id');
	}

	public function userCats()
	{
		return $this->hasMany(Usercats::class, 'catCarta_id');
	}
}
