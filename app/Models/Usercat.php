<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usercat extends Model
{
    use HasFactory;
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo(userinf::class, 'userinf_id');
	}

	public function categoria()
	{
		return $this->belongsTo(categorias_cartas::class, 'catCarta_id');
	}

	public function categorias()
	{
		return $this->hasOneThrough(categorias_cartas::class, userinf::class);
	}
}
